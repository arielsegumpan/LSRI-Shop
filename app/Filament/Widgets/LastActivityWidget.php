<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use App\Models\Order;
use App\Models\Product;
use App\Models\BlogPost;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LastActivityWidget extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = 'full';
    protected static ?string $heading = 'Latest Activity';

    public function table(Table $table): Table
    {
        return $table
            ->default() // No need for a query method since we're using getTableRecords()
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'BlogPost' => 'success',
                        'Order' => 'warning',
                        'Product' => 'info',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->description(fn (array $record): string => $record['description'] ?? ''),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge(),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->button()
                    ->url(fn (array $record): string => $record['url'] ?? '#')
                    ->openUrlInNewTab(),
            ]);
    }


    // ERROR .. NEED PANI KAYOHON OR FIX
    public function getTableRecords(): array
    {
        // Get recent blog posts
        $blogPosts = BlogPost::latest('created_at')
            ->take(5)
            ->get()
            ->map(function (BlogPost $post) {
                return [
                    'id' => 'blog-' . $post->id,
                    'type' => 'BlogPost',
                    'name' => $post->title,
                    'description' => substr($post->content, 0, 100) . '...',
                    'created_at' => $post->created_at,
                    'status' => $post->is_visible ? 'Published' : 'Draft',
                    'url' => route('filament.admin.resources.blog-posts.edit', $post),
                ];
            });

        // Get recent orders
        $orders = Order::latest('created_at')
            ->take(5)
            ->get()
            ->map(function (Order $order) {
                return [
                    'id' => 'order-' . $order->id,
                    'type' => 'Order',
                    'name' => '#' . $order->order_number,
                    'description' => $order->order_status,
                    'created_at' => $order->created_at,
                    'status' => $order->order_status,
                    'url' => route('filament.admin.resources.orders.edit', $order),
                ];
            });

        // Get recent products
        $products = Product::latest('created_at')
            ->take(5)
            ->get()
            ->map(function (Product $product) {
                return [
                    'id' => 'product-' . $product->id,
                    'type' => 'Product',
                    'name' => $product->prod_name,
                    'description' => substr($product->prod_desc, 0, 100) . '...',
                    'created_at' => $product->created_at,
                    'status' => $product->is_visible ? 'Visible' : 'Hidden',
                    'url' => route('filament.admin.resources.products.edit', $product),
                ];
            });

        // Combine all records, sort by creation date, and return
        return $blogPosts->concat($orders)->concat($products)->sortByDesc('created_at')->values()->toArray();
    }
}
