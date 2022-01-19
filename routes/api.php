<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarnyardController;
use App\Http\Controllers\StatiticsController;
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


Route::prefix("auth")->group(
    function () {
        Route::post("login", [AuthController::class, 'login']);
        Route::post("register", [AuthController::class, "register"]);
        Route::middleware("auth.jwt")->group(function () {
            Route::post("logout", [AuthController::class, "logout"]);
            Route::post("refresh", [AuthController::class, "refresh"]);
            Route::post("me", [AuthController::class, "me"]);
            Route::get("renew", [AuthController::class, "renew"]);
            Route::get("change-password", [
                AuthController::class,
                "changePassword",
            ]);
        });
    }
);

// Route::group(
//     [
//         "middleware" => ["api", 'jwt.verify'],
//     ],

// function ($router) {
Route::resource("animals", AnimalController::class);
Route::get("age-average", [AnimalController::class, 'ageAverage']);
Route::resource("barnyards", BarnyardController::class, ['update']);
Route::post("barnyards/{id}", [BarnyardController::class, 'update']);
Route::get("barnyards-for-select", [BarnyardController::class, 'forSelect']);
Route::get("statitics", [StatiticsController::class, 'get']);
Route::get("generate", [BarnyardController::class, 'generate']);
Route::get("get-barnyards", [BarnyardController::class, 'get']);
//     }
// );
