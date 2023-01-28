<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
    Route::get('/home', [App\Http\Controllers\AdminHomeController::class, 'getHomeData'])->name('adminHome');
    Route::resource('/user', UserController::class);
    // Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('index');
});


Route::prefix('user')->middleware(['auth', 'user'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'user'])->name('user');
    Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
});


