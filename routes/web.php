<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToppageController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ArticlesController;

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

Route::get('/', [ToppageController::class, 'index'])->name('toppage.index');

Auth::routes();

Route::resource('categories', CategoriesController::class)->middleware('auth');
Route::resource('articles', ArticlesController::class)->middleware('auth');

Route::get('/', [CategoriesController::class, 'create'])->name('categories.create');

