<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Stock\Product\ProductList;
use App\Livewire\Stock\Product\ProductForm;
use App\Livewire\Stock\Category\CategoryList;
use App\Livewire\Stock\Category\CategoryForm;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});


Route::middleware('auth')->group(function () {
    Route::get('stock/products', ProductList::class)->name('stock.products');
    Route::get('stock/products/create', ProductForm::class)->name('stock.products.create');

    // Category routes
    Route::get('stock/categories', CategoryList::class)->name('stock.categories');
    Route::get('stock/categories/create', CategoryForm::class)->name('stock.categories.create');
});


require __DIR__.'/auth.php';
