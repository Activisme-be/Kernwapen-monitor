<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Articles\FrontendController;

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

Auth::routes(['register' => false]);
 
// Home routes
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// News routes 
Route::get('/nieuws', [FrontendController::class, 'index'])->name('articles.index');
Route::get('/nieuws/{article}', [FrontendController::class, 'show'])->name('article.show');