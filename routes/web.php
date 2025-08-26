<?php

use App\Livewire\Debt\DebtList;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Stock\Product\ProductList;
use App\Livewire\Stock\Product\ProductForm;
use App\Livewire\Stock\Category\CategoryList;
use App\Livewire\Stock\Category\CategoryForm;
use App\Livewire\Stock\Movement\StockMovementForm;
use App\Livewire\Stock\Movement\StockMovementList;
use App\Livewire\Debt\CustomerDebt;
use App\Livewire\Debt\DebtManage;

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
    Route::get('stock/product/{categoryId}', ProductList::class)->name('stock.products.category');
    Route::get('stock/products/create', ProductForm::class)->name('stock.products.create');

    // Category routes
    Route::get('stock/categories', CategoryList::class)->name('stock.categories');
    Route::get('stock/categories/create', CategoryForm::class)->name('stock.categories.create');

    // Stock Movement routes
    Route::get('stock/movements', StockMovementList::class)->name('stock.movements');
    Route::get('stock/movements/create', StockMovementForm::class)->name('stock.movements.create');
    
    // debt routes
    Route::get('debts/customers', DebtList::class)->name('debts.customers');
    Route::get('debts/customer/{customer}', CustomerDebt::class)->name('debts.customer');
    Route::get('debts/manage', DebtManage::class)->name('debts.manage');

});


require __DIR__.'/auth.php';
