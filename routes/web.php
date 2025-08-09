<?php

use App\Livewire\Pages\BlogPage;
use App\Livewire\Pages\Checkout;
use App\Livewire\Pages\HomePage;
use App\Livewire\Pages\Services;
use App\Livewire\Pages\ShopPage;
use App\Livewire\Pages\AboutPage;
use App\Livewire\Pages\ContactPage;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\BlogPageSingle;
use App\Livewire\Pages\ShopPageSingle;
use App\Livewire\Pages\CustomerDashboard;
use App\Livewire\Pages\ProductCategorieArchive;

Route::get('/', HomePage::class)->name('page.home');

Route::get('/about', AboutPage::class)->name('page.about');

Route::get('/contact', ContactPage::class)->name('page.contact');

Route::get('/blogs', BlogPage::class)->name('page.blog');

Route::get('/blogs/{post_slug}', BlogPageSingle::class)->name('page.blog.single');

Route::get('/shop', ShopPage::class)->name('page.shop');
Route::get('/shop/{prod_slug}', ShopPageSingle::class)->name('page.shop.single');
Route::get('/shop/categories/{prod_cat_slug}', ProductCategorieArchive::class)->name('page.shop.category');

Route::get('/services', Services::class)->name('page.services');
Route::get('/checkout', Checkout::class)->name('page.checkout');

Route::middleware(['customer.role'])->group(function () {
    Route::get('/customer-dashboard', CustomerDashboard::class)->name('page.customer-dashboard');
});
