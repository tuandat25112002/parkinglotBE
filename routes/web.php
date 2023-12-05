<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExampleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProhibitedController;

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

    Route::get('login', [AdminController::class, 'login'])->name('login');
Route::get('register', [AdminController::class, 'register'])->name('register');
Route::post('check-login', [AdminController::class, 'checkLogin']);
Route::post('create-user', [AdminController::class, 'create'])->name('create-user');
Route::group([
    'prefix' => '/admin',
    'middleware' => ['auth'],
], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('logout', [AdminController::class, 'logoutHttp'])->name('logout');

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
