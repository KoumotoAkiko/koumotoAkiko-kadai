<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where yoregister web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',[ContactController::class, 'index']);
Route::post('/contacts/confirm',[ContactController::class, 'confirm']);
Route::post('/contacts',[ContactController::class, 'store']);
Route::get('/contacts', [ContactController::class, 'create']);
Route::get('/contacts/search',[ContactController::class, 'search']);

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'admin']);
});

Route::get('/admin', [AdminController::class, 'index']);

