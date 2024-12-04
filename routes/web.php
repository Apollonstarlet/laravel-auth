<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PageController;
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

// locale route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
Route::get('fresh', function() { Artisan::call('migrate:fresh'); return back();});
Route::get('migrate', function() { Artisan::call('thinker'); return back();});

// Cache Clear
Route::get('clear', function() { Artisan::call('config:clear'); Artisan::call('cache:clear'); Artisan::call('view:clear'); Artisan::call('route:clear'); return back();
});

Route::get('/', [PageController::class, 'LandingPage']);
Route::post('signup', [PageController::class, 'Signup'])->name('signup');


                           // User panel 
Route::get('home', [QuotesController::class, 'Home'])->name('user-home');
Route::get('quotes', [QuotesController::class, 'Quotes'])->name('quotes');
Route::get('setting', [QuotesController::class, 'Setting'])->name('setting');
Route::get('security', [QuotesController::class, 'Security'])->name('security');

                           // Admin
// Route::get('verifyPlaylist', [AdminController::class, 'Playlists']);
// Route::get('curators', [AdminController::class, 'Curators']);
// Route::get('withdraw', [AdminController::class, 'Withdraw']);
// Route::post('status', [AdminController::class, 'Status'])->name('status');
// Route::post('admin-pay', [AdminController::class, 'Payment'])->name('pay');
