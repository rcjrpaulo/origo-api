<?php

use App\Http\Controllers\api\v1\ClienteController;
use App\Http\Controllers\api\v1\PlanoController;
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

Route::group(['prefix' => 'v1'], function () {
    /*
     * Authentication Routes
     * */
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/register', [AuthController::class, 'register'])
            ->name('register');

        Route::post('/login', [AuthController::class, 'login'])
            ->name('login');

        Route::group(['middleware' => 'auth:sanctum'], function () {
            Route::get('/user', [AuthController::class, 'user'])
                ->name('user');

            Route::post('/logout', [AuthController::class, 'logout'])
                ->name('logout');

            Route::post('/logout-all-devices', [AuthController::class, 'logoutAllDevices'])
                ->name('logoutAllDevices');
        });
    });

    Route::group(['middleware' => 'auth:sanctum'], function () {
        /*
         * Cliente Routes
         * */
        Route::apiResource('clientes', ClienteController::class);

        /*
         * Plano Routes
         * */
        Route::apiResource('planos', PlanoController::class)->only('index');
    });
});
