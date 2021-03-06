<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Articles\BackendController;
use App\Http\Controllers\Articles\CategoryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Users\AccountController;
use App\Http\Controllers\Users\IndexController;
use App\Http\Controllers\Users\LockController;
use App\Http\Controllers\Monitor\DashboardController;
use App\Http\Controllers\Monitor\NoteController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Activity routes
Route::get('{user}/logs', [ActivityController::class, 'show'])->name('users.activity');

// Notification routes
Route::get('/notificaties/{type?}', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('/notificaties/markAll', [NotificationController::class, 'markAll'])->name('notifications.markAll');
Route::get('/notificaties/markOne/{notification}', [NotificationController::class, 'markOne'])->name('notifications.markAsRead');

// User state routes
Route::get('/account/gedeactiveerd', [LockController::class, 'index'])->name('user.blocked');
Route::get('/{userEntity}/deactiveer', [LockController::class, 'create'])->name('users.lock');
Route::get('/{userEntity}/activeer', [LockController::class, 'destroy'])->name('users.unlock');
Route::post('/{userEntity}/deactiveer', [LockController::class, 'store'])->name('users.lock.store');

// User Settings routes
Route::get('/account/{type?}', [AccountController::class, 'index'])->name('account.settings');
Route::patch('/account/informatie', [AccountController::class, 'updateInformation'])->name('account.settings.info');
Route::patch('/account/beveiliging', [AccountController::class, 'updateSecurity'])->name('account.settings.security');

// User routes
Route::match(['get', 'delete'], '/verwijder/gebruiker/{user}', [IndexController::class, 'destroy'])->name('users.destroy');
Route::get('/gebruikers/zoek', [IndexController::class, 'search'])->name('users.search');
Route::get('/gebruiker/{user}', [IndexController::class, 'show'])->name('users.show');
Route::patch('/gebruikers/{user}', [IndexController::class, 'update'])->name('users.update');
Route::get('/gebruikers/nieuw', [IndexController::class, 'create'])->name('users.create');
Route::post('/gebruikers/nieuw', [IndexController::class, 'store'])->name('users.store');
Route::get('/gebruikers/{filter?}', [IndexController::class, 'index'])->name('users.index');

// Category routes
Route::get('/categorieen', [CategoryController::class, 'dashboard'])->name('categories.dashboard');
Route::get('/categorieen/nieuw', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categorieen/nieuw', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categorieen/verwijder/{tag}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// Article routes
Route::get('/artikelen', [BackendController::class, 'index'])->name('articles.dashboard');
Route::get('/artikelen/nieuw', [BackendController::class, 'create'])->name('articles.create');
Route::post('/artikelen/nieuw', [BackendController::class, 'store'])->name('articles.store');

// City Note Routes 
Route::get('/notities/zoek/{city}/{term?}', [NoteController::class, 'search'])->name('monitor.notes.search');
Route::get('/notities/{note}', [NoteController::class, 'show'])->name('note.show');

// Monitor Routes
Route::get('/monitor', [DashboardController::class, 'dashboardSearch'])->name('monitor.search');
Route::get('/monitor/{type?}', [DashboardController::class, 'dashboard'])->name('monitor.dashboard');
Route::get('/monitor/stad/{city}', [DashboardController::class, 'show'])->name('monitor.show');
Route::patch('/monitor/stad/{city}', [DashboardController::class, 'update'])->name('monitor.show.update');
Route::get('/monitor/notities/{note}/verwijder', [NoteController::class, 'destroy'])->name('monitor.notes.delete');
Route::get('/monitor/notities/{city}/nieuw', [NoteController::class, 'create'])->name('monitor.notes.create');
Route::post('/monitor/notities/{city}/nieuw', [NoteController::class, 'store'])->name('monitor.notes.store');
Route::get('/monitor/notities/{city}/{filter?}', [NoteController::class, 'index'])->name('monitor.notes');