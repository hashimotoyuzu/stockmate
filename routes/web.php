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

Route::get('stockmate/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\CategoriesController;
Route::controller(CategoriesContr::class)->group(function() {
    Route::get('stockmate', 'add');
    Route::get('stockmate', 'index');
    Route::get('stockmate', 'create');
    Route::get('stockmate', 'edit');
    Route::get('stockmate', 'update');
    Route::get('stockmate', 'new');
    Route::get('stockmate', 'show');
    Route::get('stockmate', 'new');
    Route::get('stockmate', 'destroy');
});


