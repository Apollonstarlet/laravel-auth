<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UsersController;
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

//Auth::routes();
//Route::get('email/verify', [PageController::class, 'LandingPage'])->name('verification.notice');

// Cache Clear
Route::get('clear', function() { Artisan::call('config:clear'); Artisan::call('cache:clear'); Artisan::call('view:clear'); Artisan::call('route:clear'); return back();
});

Route::get('/', [PageController::class, 'LandingPage']);
//Route::post('signup', [PageController::class, 'Signup'])->name('signup');


                           // User panel 
Route::get('cert', [PageController::class, 'CertPage'])->name('cert');
Route::post('search', [PageController::class, 'Search'])->name('search');

                           // Admin
Route::get('addpage', [PageController::class, 'AddPage'])->name('addpage');
Route::post('add', [PageController::class, 'Add'])->name('add');
