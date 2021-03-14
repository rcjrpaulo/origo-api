<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\AuthController;

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

Route::group(['prefix' => 'v1', 'namespace' => 'v1'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/register', [AuthController::class, 'register'])
            ->name('register');

        Route::post('/login', [AuthController::class, 'login'])
            ->name('login');

        Route::group(['middleware' => 'auth:sanctum'], function () {
            Route::get('/user', [AuthController::class, 'user'])
                ->name('user');
        });
    });
});
