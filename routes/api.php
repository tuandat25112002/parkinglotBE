<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ProhibitedController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::resource('parkings', ParkingController::class);
Route::post('login', [AuthController::class, 'index']);
Route::post('register', [AuthController::class, 'register']);
Route::get('prohibiteds', [ProhibitedController::class, 'list'])->name('prohibiteds');
Route::get('parking-search', [ParkingController::class, 'search'])->name('parking-search');
Route::post('update-slot', [ParkingController::class, 'updateSlot'])->name('update-slot');
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('user', [UserController::class, 'show']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('update-profile', [UserController::class, 'updatePofile'])->name('update-profile');
});
