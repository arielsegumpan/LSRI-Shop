<?php

namespace App\Filament\Admin\Widgets;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\BlogPost;
use Illuminate\Support\Number;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class DashboardStatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected static ?string $pollingInterval = '60s';
    protected int|string|array $columnSpan = 'full';

    protected function getStats(): array
    {
        return [
            // Blog stats
            Stat::make('Total Blog Posts', BlogPost::count())
                ->description('Total published blog posts')
                ->descriptionIcon('heroicon-o-document-text')
                ->color('success')
                ->chart(
                    $this->getBlogPostsPerMonthData()
                ),

            Stat::make('Published Blog Posts', BlogPost::whereNotNull('published_at')->where('is_visible', true)->count())
                ->description('Articles visible to readers')
                ->descriptionIcon('heroicon-o-eye')
                ->color('info'),

            // Product stats
            Stat::make('Total Products', Product::count())
                ->description('Products in inventory')
                ->descriptionIcon('heroicon-o-shopping-bag')
                ->color('warning')
                ->chart(
                    $this->getProductsPerMonthData()
                ),

            Stat::make('Low Stock Products', Product::whereRaw('prod_qty <= prod_security_stock')->count())
                ->description('Products below security stock level')
                ->descriptionIcon('heroicon-o-exclamation-triangle')
                ->color('danger'),

            // Order stats
            Stat::make('Total Orders', Order::count())
                ->description('All orders')
                ->descriptionIcon('heroicon-o-shopping-cart')
                ->color('primary')
                ->chart(
                    $this->getOrdersPerMonthData()
                ),

            Stat::make('Revenue', $this->getFormattedRevenue())
                ->description('Total revenue')
                ->descriptionIcon('heroicon-o-banknotes')
                ->color('success'),

            // User stats
            Stat::make('Total Users', User::count())
                ->description('Registered users')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('gray'),
        ];
    }

    private function getBlogPostsPerMonthData(): array
    {
        return $this->getMonthlyData(BlogPost::class);
    }

    private function getProductsPerMonthData(): array
    {
        return $this->getMonthlyData(Product::class);
    }

    private function getOrdersPerMonthData(): array
    {
        return $this->getMonthlyData(Order::class);
    }

    private function getMonthlyData(string $model): array
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $count = $model::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();
            $data[] = $count;
        }
        return $data;
    }

    private function getFormattedRevenue(): string
    {
        $total = Order::sum('order_total_price');
        return Number::currency($total, 'PHP');
    }
}
