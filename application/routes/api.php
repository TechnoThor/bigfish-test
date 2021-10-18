<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'users'], function(){
    Route::post('/', [UserController::class, 'storeUser']);
    Route::group(['prefix'=>'{user}'], function(){
        Route::delete('/', [UserController::class, 'destroyUser']);
    });
    Route::group(['prefix'=>'phone-numbers'], function(){
        Route::post('/', [UserController::class, 'storePhoneNumbers']);
        Route::group(['prefix'=>'{phoneNumber}'], function(){
            Route::delete('/', [UserController::class, 'destroyPhoneNumbers']);
        });
    });
});
