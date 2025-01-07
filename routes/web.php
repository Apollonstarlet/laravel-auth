<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\QuotesController;
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

Auth::routes();
Route::get('email/verify', [PageController::class, 'LandingPage'])->name('verification.notice');

// Cache Clear
Route::get('clear', function() { Artisan::call('config:clear'); Artisan::call('cache:clear'); Artisan::call('view:clear'); Artisan::call('route:clear'); return back();
});

Route::get('/', [PageController::class, 'LandingPage']);
Route::post('signup', [PageController::class, 'Signup'])->name('signup');


                           // User panel 
Route::get('cert', [PageController::class, 'CertPage'])->name('cert');
Route::post('search', [PageController::class, 'Search'])->name('search');

                           // Admin
Route::get('home', [UsersController::class, 'AddPage'])->name('home');
Route::post('add', [UsersController::class, 'Add'])->name('add');
Route::get('quotes', [QuotesController::class, 'Quotes'])->name('quotes');
Route::get('users', [UsersController::class, 'Users'])->name('users');
Route::get('setting', [UsersController::class, 'Setting'])->name('setting');
Route::get('security', [UsersController::class, 'Security'])->name('security');
Route::post('setting', [UsersController::class, 'Profile'])->name('profile');
Route::post('set-pwd', [UsersController::class, 'SetPassword'])->name('set-pwd');
Route::post('user-del', [UsersController::class, 'UserDel'])->name('userDel');

Route::get('cards', [UsersController::class, 'CardsPage'])->name('cards');
Route::post('card-del', [UsersController::class, 'CardDel'])->name('card-del');
Route::post('card-edit', [UsersController::class, 'CardEdit'])->name('card-edit');
Route::post('card-update', [UsersController::class, 'CardUpdate'])->name('card-update');