<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//register new user
Route::post('/create-account', [\App\Http\Controllers\AuthenticationController::class, 'createAccount']);
//login user
Route::post('/signin', [\App\Http\Controllers\AuthenticationController::class, 'signin']);
//using middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('contributions/{member_id}', [\App\Http\Controllers\AuthenticationController::class, 'contributions']);
    Route::post('member/register', 'AuthenticationController@store_api')->name('store-member-api');
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::post('/sign-out', [\App\Http\Controllers\AuthenticationController::class, 'logout']);
});
