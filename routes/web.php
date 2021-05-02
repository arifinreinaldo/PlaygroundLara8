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


Route::get('/book', [\App\Http\Controllers\BookController::class, 'index'])->name('book');
Route::get('/ajaxBook', [\App\Http\Controllers\BookController::class, 'ajax']);
Route::post('/saveBook', [\App\Http\Controllers\BookController::class, 'store']);
Route::get('/', function () {
    return view('welcome');
});
