<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
