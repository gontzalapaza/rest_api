<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GNewController;
use App\Http\Controllers\Api\PassportAuthController;

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

Route::get('gnews', 'GNewController@index');

Route::prefix('gnews')->middleware(['auth:api'])->group(function () {
    //Route::get('news', \App\Http\Controllers\GNewController::index);
    Route::get('/news', [GNewController::class, 'index']);
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [PassportAuthController::class, 'login']);
    Route::post('signup', [PassportAuthController::class, 'signUp']);

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', [PassportAuthController::class, 'logout']);
        Route::get('user', [PassportAuthController::class, 'user']);
    });
});
