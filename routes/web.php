<?php

use App\Http\Controllers\UserController;
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