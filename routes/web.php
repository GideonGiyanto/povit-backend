<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\registerController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isLogin;
use App\Http\Middleware\isNotLogin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('components.template');
})->name('home');

Route::get('/check_login', function(){
    return ' ehe dia login';
})->name('check_login')->middleware(isLogin::class);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware(isLogin::class);

Route::get('/register', [AuthController::class, 'registerview'])->name('register_page');

Route::post('/register', [AuthController::class, 'register'])->name('register_store');

Route::get('/login', [AuthController::class, 'loginview'])-> name('login_page')->middleware(isNotLogin::class);

Route::post('/login',[AuthController::class, 'login'])->name('login_store')->middleware(isNotLogin::class);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware(isLogin::class);

Route::resource('admin', AdminController::class)->middleware([isLogin::class, isAdmin::class]);
