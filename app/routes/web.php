<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('home');
Route::get('/product/{slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

Route::post('/cart/add', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::get('/cart/delete/{id}', [\App\Http\Controllers\CartController::class, 'delete'])->name('cart.delete');
Route::get('/cart/show', [\App\Http\Controllers\CartController::class, 'show'])->name('cart.show');
