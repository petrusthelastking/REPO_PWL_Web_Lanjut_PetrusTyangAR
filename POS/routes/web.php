<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;

// Halaman Home
// Route::get('/', [HomeController::class, 'index']);

// // Route prefix untuk daftar produk
// Route::prefix('category')->group(function() {
//     Route::get('/food-beverage', [ProductsController::class, 'foodBeverage']);
//     Route::get('/beauty-health', [ProductsController::class, 'beautyHealth']);
//     Route::get('/home-care', [ProductsController::class, 'homeCare']);
//     Route::get('/baby-kid', [ProductsController::class, 'babyKid']);
// });

// // Halaman User
// Route::get('/user/{id}/name/{name}', [UserController::class, 'profile']);

// // Halaman Sales
// Route::get('/sales', [SalesController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);
Route::get('kategori', [KategoriController::class, 'index']);
Route::get('user', [UserController::class, 'index']);
