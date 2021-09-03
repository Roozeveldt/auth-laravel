<?php

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

Route::get('/register', [UserController::class, 'register']);
Route::get('/forgot', [UserController::class, 'forgot']);
Route::get('/reset/{email}/{token}', [UserController::class, 'reset'])->name('reset');

Route::post('/register', [UserController::class, 'saveUser'])->name('auth.register');
Route::post('/login', [UserController::class, 'loginUser'])->name('auth.login');
Route::post('/forgot', [UserController::class, 'forgotPassword'])->name('auth.forgot');

Route::group(['middleware' => ['LoginCheck']], function() {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/', [UserController::class, 'index']);
    Route::get('/logout', [UserController::class, 'logout'])->name('auth.logout');
    Route::post('/profile-image', [UserController::class, 'profileImageUpdate'])->name('profile.image');
    Route::post('/profile-update', [UserController::class, 'profileUpdate'])->name('profile.update');
});
