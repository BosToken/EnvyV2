<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
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

Route::get('',[UserController::class, 'welcome']);
Route::get('product',[UserController::class, 'product']);

Route::get('login',[UserController::class, 'login']);
Route::post('login/check', [UserController::class, 'check']);
Route::get('logout', [UserController::class, 'logout']);

Route::get('register',[UserController::class, 'register']);
Route::put('register/store',[UserController::class, 'store']);

Route::get('profile',[UserController::class, 'profile']);
Route::put('profile/username/update/{id}',[UserController::class, 'profileUsername']);
Route::put('profile/phone/update/{id}',[UserController::class, 'profilePhone']);
Route::put('profile/address/store/{id}',[AddressController::class, 'store']);
Route::put('profile/address/update/{id}',[AddressController::class, 'update']);
Route::get('profile/address/destroy/{id}',[AddressController::class, 'destroy']);

Route::get('cart',[CartController::class, 'index']);
Route::get('cart/store/{id}',[CartController::class, 'store']);
Route::get('cart/destroy/{id}',[CartController::class, 'destroy']);

Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
Route::get('admin/addProduct', [ProductController::class, 'index']);
Route::post('admin/addProduct/store', [ProductController::class, 'store']);
Route::get('admin/addProduct/destroy/{id}',[ProductController::class, 'destroy']);

Route::get('admin/activeProduct', [ProductController::class, 'activeProduct']);

Route::get('admin/closedProduct', [ProductController::class, 'closedProduct']);
Route::put('admin/closedProduct/update/{id}', [ProductController::class, 'closedUpdate']);

Route::get('admin/archiveProduct', [ProductController::class, 'archiveProduct']);
Route::put('admin/archiveProduct/update/{id}', [ProductController::class, 'archiveUpdate']);
