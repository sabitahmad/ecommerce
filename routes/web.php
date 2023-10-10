<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\BackendDashboardController;
use App\Http\Controllers\Backend\BackendPermissionController;
use App\Http\Controllers\Backend\BackendRoleController;
use App\Http\Controllers\Backend\BackendUsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('loginPost');
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('registerPost');
});
Route::get('logout', [LogoutController::class, 'index'])->middleware('auth')->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('admin/dashboard', [BackendDashboardController::class, 'index'])->name('backend.dashboard');
    Route::resource('admin/users', BackendUsersController::class);
    Route::resource('admin/roles', BackendRoleController::class);
    Route::resource('admin/permissions', BackendPermissionController::class);
});


