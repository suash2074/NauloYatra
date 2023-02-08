<?php

use App\Http\Controllers\Admin\AboutSectionContreller;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\CultureController;
use App\Http\Controllers\Admin\GalleriesController;
use App\Http\Controllers\Admin\Gallery_detailsController;
use App\Http\Controllers\Admin\Health_kitController;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\Admin\News_detailsController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\Package_detailsController;
use App\Http\Controllers\Admin\PackagesController;
use App\Http\Controllers\Admin\TrekContreller;
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
    Route::resource('/trek', TrekContreller::class);
    Route::resource('/about', AboutSectionContreller::class);
    Route::resource('/culture', CultureController::class);
    Route::resource('/medicine', MedicineController::class);
    Route::resource('/healthKit', Health_kitController::class);
    Route::resource('/galleryDetail', Gallery_detailsController::class);
    Route::resource('/gallery', GalleriesController::class);
    Route::resource('/comment', CommentsController::class);
    Route::resource('/news', NewsController::class);
    Route::resource('/newsDetail', News_detailsController::class);
    Route::resource('/package', PackagesController::class);
    Route::resource('/packageDetail', Package_detailsController::class);
    // Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('index');
});


Route::prefix('user')->middleware(['auth', 'user'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'user'])->name('user');
    Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
});

Route::prefix('guide')->middleware(['auth', 'guide'])->group(function () {
    
});
