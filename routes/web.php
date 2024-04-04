<?php

use Illuminate\Support\Facades\Route;
use LDAP\Result;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\productController;
use App\Http\Controllers\homeController;

Route::get('/',[homeController::class,'index'])->name('home');

Route::get('/products',[productController::class,'index'])->name('product.list');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/filter-products', [ProductController::class, 'filterProducts'])->name('products.store');


