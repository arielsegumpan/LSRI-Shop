<?php

namespace App\Livewire\Traits;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

trait HasAlertNotification
{
    /**
     * Send a sweet alert notification.
     *
     * @param string $title The title of the alert
     * @param string $icon  The type of alert ('success', 'error', 'warning', 'info', etc.)
     * @param int    $timer Duration in milliseconds
     * @return mixed
     */
    public function notify(string $title, string $icon = 'success', int $timer = 3000)
    {
        $alert = LivewireAlert::title($title)
            ->timer($timer)
            ->toast()
            ->position('bottom-end');

        match ($icon) {
            'success' => $alert->success(),
            'error'   => $alert->error(),
            'warning' => $alert->warning(),
            'info'    => $alert->info(),
            default   => $alert->success(),
        };

        return $alert->show();
    }
}
