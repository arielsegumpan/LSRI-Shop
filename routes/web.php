<?php

use App\Livewire\Pages\BlogPage;
use App\Livewire\Pages\HomePage;
use App\Livewire\Pages\ShopPage;
use App\Livewire\Pages\AboutPage;
use App\Livewire\Pages\ContactPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('page.home');

Route::get('/about', AboutPage::class)->name('page.about');

Route::get('/contact', ContactPage::class)->name('page.contact');

Route::get('/blog', BlogPage::class)->name('page.blog');

Route::get('/shop', ShopPage::class)->name('page.shop');
