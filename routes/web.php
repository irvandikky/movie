<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;

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

require __DIR__ . '/auth.php';
Route::middleware(['auth'])
    ->get('/dashboard', function () {
        return view('dashboard');
    })
    ->name('dashboard');
Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('genres', GenreController::class);
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('movies', MovieController::class);
    });

Route::get('/', [IndexController::class, 'index']);
Route::get('/{category}/{movie?}', [IndexController::class, 'category'])->name('detail');
