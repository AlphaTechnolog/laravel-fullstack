<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

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

Route::group(['middleware' => ['unauth']], function () {
    Route::view('/', 'login')->name('login');
    Route::view('/signup', 'signup')->name('signup');
});

Route::group(['middleware' => ['auth']], function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/logout', [AuthController::class, 'doLogout']);

    Route::prefix('tasks')->group(function () {
        Route::view('/add', 'tasks.add');

        Route::get('/edit/{id}', [TaskController::class, 'editView'])
            ->whereNumber('id');
    });
});
