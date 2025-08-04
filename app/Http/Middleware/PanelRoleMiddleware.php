<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Filament\Facades\Filament;
use Symfony\Component\HttpFoundation\Response;

class PanelRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $currentPanelId = Filament::getCurrentPanel()?->getId();

        if (!$user || !$currentPanelId) {
            return redirect()->route('filament.auth.auth.login');
        }

        // Define panel-to-role mapping
        $panelRoles = [
            'admin' => 'super_admin',
            'service' => ['mechanic'],
        ];

        $requiredRoles = $panelRoles[$currentPanelId] ?? [];

        if (!$user->hasAnyRole($requiredRoles)) {
            if ($user->hasRole('super_admin')) {
                return redirect()->to(Filament::getPanel('admin')->getUrl());
            }

            if ($user->hasAnyRole(['mechanic'])) {
                return redirect()->to(Filament::getPanel('service')->getUrl());
            }

            return redirect()->route('filament.auth.auth.login');
        }

        return $next($request);
    }
}
