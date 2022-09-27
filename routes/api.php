<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ContactInformationController;
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

Route::post('auth', [AuthController::class, 'login']);

Route::middleware('auth:api')->group( function () {
    Route::resource('contacts', ContactController::class)->only(['index','show', 'store', 'update', 'destroy']);;
    Route::resource('contacts/{contact}/informations', ContactInformationController::class)->only(['store','destroy']);
});
