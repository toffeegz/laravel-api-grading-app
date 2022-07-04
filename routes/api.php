<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', LoginController::class);
    Route::post('logout', LogoutController::class);
    Route::get('profile', ProfileController::class);
});

// Route::resource('/roles', RoleController::class);
Route::resource('/users', UserController::class);