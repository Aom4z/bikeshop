<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function() {
    return view('layouts.master');
});
Route::get('/product',[App\Http\Controllers\ProductController::class, 'index']);
Route::get('/category',[App\Http\Controllers\CategoryController::class, 'index']);
Route::post('/product/search', [ProductController::class, 'search']);
Route::get('/product/search', [ProductController::class, 'search']);
Route::get('/product/edit/{id?}', [ProductController::class, 'edit']);
Route::post('/product/update', [ProductController::class, 'update']);
Route::post('/product/insert', [ProductController::class, 'insert']);
Route::get('/product/remove/{id?}', [ProductController::class, 'remove']);

Route::post('/category/search', [CategoryController::class, 'search']);
Route::get('/category/search', [CategoryController::class, 'search']);
Route::get('/category/edit/{id?}', [CategoryController::class, 'edit']);
Route::post('/category/update', [CategoryController::class, 'update']);
Route::post('/category/insert', [CategoryController::class, 'insert']);
Route::get('/category/remove/{id?}', [CategoryController::class, 'remove']);

