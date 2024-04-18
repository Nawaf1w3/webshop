<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\productController;
use App\Http\Controllers\homeController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/',[homeController::class,'index'])->name('home');

Route::get('/products',[productController::class,'index'])->name('product.list');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::post('/filter-products', [ProductController::class, 'filter'])->name('products.filter');



Route::get('/categories/create', [ProductController::class, 'createCategory'])->name('categories.create');
Route::post('/categories', [ProductController::class, 'storeCategory'])->name('categories.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

