<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToppageController;
use App\Http\Controllers\CategoriesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ToppageController::class, 'index'])->name('toppage.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(CategoriesController::class)->group(function() {
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

