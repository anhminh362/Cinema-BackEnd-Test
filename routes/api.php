<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('account', [\App\Http\Controllers\UserController::class,'index']);
//Route::get('account/{id}', [\App\Http\Controllers\UserController::class,'show']);

Route::controller(\App\Http\Controllers\UserController::class)->group(function () {
    Route::get('user', 'index');
    Route::get('user/{id}', 'show');
    Route::post('user', 'store');
});

Route::controller(\App\Http\Controllers\AccountController::class)->group(function () {
   Route::get('account','index');
   Route::post('account','store');
});

Route::post('register',[\App\Http\Controllers\AuthController::class,'register']);
Route::post('verify',[\App\Http\Controllers\VerificationController::class,'verifyOtp']);
