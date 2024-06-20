<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ProhibitedController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('', [AdminController::class, 'login'])->name('login');
Route::get('login', [AdminController::class, 'login'])->name('login');
Route::get('register', [AdminController::class, 'register'])->name('register');
Route::post('check-login', [AdminController::class, 'checkLogin']);
Route::post('create-user', [AdminController::class, 'create'])->name('create-user');
Route::group([
    'prefix' => '/admin',
    'middleware' => ['auth', 'agent'],
], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('logout', [AdminController::class, 'logoutHttp'])->name('logout');

    Route::group([
        'middleware' => ['admin'],
    ], function () {
        Route::resource('categories', CategoryController::class);
        Route::get('new-user', [UserController::class, 'create'])->name('new-user');
        Route::get('list-user', [UserController::class, 'index'])->name('list-user');
        Route::get('get-user', [UserController::class, 'getUser'])->name('get-user');
        Route::resource('users', UserController::class);
        Route::post('user-active', [UserController::class, 'updateActive'])->name('user-active');
        Route::post('user-role', [UserController::class, 'updateRole'])->name('user-role');
        Route::get('new-park', [ParkingController::class, 'create'])->name('new-park');
        Route::get('list-park', [ParkingController::class, 'list'])->name('list-park');
        Route::get('new-row', [ProhibitedController::class, 'create'])->name('new-row');
        Route::get('list-row', [ProhibitedController::class, 'index'])->name('list-row');
        Route::get('list-support', [SupportController::class, 'index'])->name('list-support');
        Route::post('support-status', [SupportController::class, 'updateStatus'])->name('support-status');
        Route::resource('parks', ParkingController::class);
        Route::resource('sos', SupportController::class);
    });
});
// quản lý tuyến đường cấm
Route::resource('Prohibited', ProhibitedController::class);

Route::resource('categories', CategoryController::class);

// Admin page management
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => [],
], function () {
    // Example management
    Route::resource('examples', ExampleController::class);
    Route::get('something', [ExampleController::class, 'somethingMethod'])->name('something.get');

    // Other management
    // TODO: Handle route management
});
