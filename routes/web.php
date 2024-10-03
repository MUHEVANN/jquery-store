<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.page');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

Route::resource('product', ProductController::class)->except(['update'])->names('product');
Route::controller(ProductController::class)->group(function () {
    Route::post('/product/{product}', 'update')->name('product.update');
    Route::get('/products/all-data', 'allData')->name('product.allData');
    Route::get('/products/all', 'all')->name('product.all');
    Route::get('products/{category}', 'getByCategory')->name('product.category');
    Route::get('products/{product}/product-image', 'productImageByProduct')->name('product.productImage');
    Route::delete('products/{image}/product-image', 'deleteImage')->name('product.deleteImage');
});

Route::resource('category', CategoryController::class)->names('category');
Route::controller(CategoryController::class)->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/all-data', 'allData')->name('category.allData');
        Route::get('/category-datatable', 'getCategoriDatatable')->name('category.datatable');
    });
});

Route::controller(PagesController::class)->group(function () {
    Route::get('/about-page', 'about')->name('about.page');
    Route::get('/contact-page', 'contact')->name('contact.page');
    Route::get('/products-page', 'products')->name('products.page');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';