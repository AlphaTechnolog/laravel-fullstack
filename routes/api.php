<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['unauth']], function () {
    Route::post('/login', [AuthController::class, 'doLogin'])->name('dologin');
    Route::post('/signup', [AuthController::class, 'doSignup'])->name('dosignup');
});

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('tasks')->group(function () {
        Route::get('/fetchall/{id}', [TaskController::class, 'fetchall'])
            ->whereNumber('id');

        Route::post('/add', [TaskController::class, 'add']);

        Route::get('/delete/{id}', [TaskController::class, 'delete'])
            ->whereNumber('id');

        Route::post('/edit/{id}', [TaskController::class, 'update'])
            ->whereNumber('id');
    });
});
