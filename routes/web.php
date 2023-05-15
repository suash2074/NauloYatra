<?php

use App\Http\Controllers\Admin\AboutSectionContreller;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\CultureController;
use App\Http\Controllers\Admin\GalleriesController;
use App\Http\Controllers\Admin\Gallery_detailsController;
use App\Http\Controllers\Admin\Health_kitController;
use App\Http\Controllers\admin\MapController;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\Admin\News_detailsController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\Package_detailsController;
use App\Http\Controllers\Admin\PackagesController;
// use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\TrekContreller;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\EsewaController;
use App\Http\Controllers\Guide\AboutSectionController;
use App\Http\Controllers\Guide\BookingController as GuideBookingController;
use App\Http\Controllers\Guide\CultureController as GuideCultureController;
use App\Http\Controllers\Guide\GalleriesController as GuideGalleriesController;
use App\Http\Controllers\Guide\Gallery_DetailsController as GuideGallery_DetailsController;
use App\Http\Controllers\Guide\GuideProfileController;
use App\Http\Controllers\Guide\Health_KitController as GuideHealth_KitController;
use App\Http\Controllers\Guide\MapController as GuideMapController;
use App\Http\Controllers\Guide\MedicineController as GuideMedicineController;
use App\Http\Controllers\Guide\News_DetailsController as GuideNews_DetailsController;
use App\Http\Controllers\Guide\NewsController as GuideNewsController;
use App\Http\Controllers\Guide\Package_DetailsController as GuidePackage_DetailsController;
use App\Http\Controllers\Guide\PackagesController as GuidePackagesController;
use App\Http\Controllers\Guide\TrekController as GuideTrekController;
use App\Http\Controllers\ProfileController;
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
    Route::resource('/map', MapController::class);
    Route::resource('/comment', CommentsController::class);
    Route::resource('/news', NewsController::class);
    Route::resource('/newsDetail', News_detailsController::class);
    Route::resource('/package', PackagesController::class);
    Route::resource('/packageDetail', Package_detailsController::class);
    Route::resource('/booking', BookingController::class);
    // Route::resource('/profile', AdminProfileController::class);
    Route::resource('/profile', AdminProfileController::class, [
        'names' => 'adminProfile'
    ]);


    Route::get('/adminBlog', [App\Http\Controllers\HomeController::class, 'adminBlog'])->name('adminBlog');
    Route::get('/adminBlogContent{id}', [App\Http\Controllers\HomeController::class, 'adminBlogContent'])->name('adminBlogContent');
    Route::get('/adminBlogGallery{id}', [App\Http\Controllers\HomeController::class, 'adminBlogGallery'])->name('adminBlogGallery');
    Route::post('/adminBlogPost/Comment', [App\Http\Controllers\HomeController::class, 'adminBlogPostComment'])->name('adminBlogPostComment');

});


Route::prefix('user')->middleware(['auth', 'user'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'user'])->name('user');
    Route::get('/aboutus', [App\Http\Controllers\HomeController::class, 'about_us'])->name('about_us');
    Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
    Route::get('/content{id}', [App\Http\Controllers\BlogContentController::class, 'index'])->name('content');
    Route::post('/post/comment', [App\Http\Controllers\BlogContentController::class, 'postComment'])->name('postComment');
    Route::get('/newsDetail{id}', [App\Http\Controllers\NewsDetailsController::class, 'index'])->name('newsDetail');
    Route::get('/packages', [App\Http\Controllers\PackagesController::class, 'index'])->name('packages');
    Route::post('/packages/book', [App\Http\Controllers\PackagesController::class, 'book'])->name('book');
    Route::get('/gallery{id}', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');
    Route::resource('/profile', ProfileController::class);
    Route::get('esewa/pay/confirm', [EsewaController::class,'esewaPayConfirm'])->name('esewaPayConfirm');
    Route::get('esewa/pay/{id}', [EsewaController::class,'esewaPay'])->name('esewa-pay');
});

Route::prefix('guide')->as('guide.')->middleware(['auth', 'guide'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'guide'])->name('guide');
    Route::get('/home', [App\Http\Controllers\GuideHomeController::class, 'getHomeData'])->name('guideHome');
    Route::resource('/trek', GuideTrekController::class);
    // Route::resource('/user', UserController::class);
    Route::resource('/about', AboutSectionController::class);
    Route::resource('/culture', GuideCultureController::class);
    Route::resource('/medicine', GuideMedicineController::class);
    Route::resource('/healthKit', GuideHealth_KitController::class);
    Route::resource('/galleryDetail', GuideGallery_DetailsController::class);
    Route::resource('/gallery', GuideGalleriesController::class);
    Route::resource('/map', GuideMapController::class);
    // Route::resource('/comment', CommentsController::class);
    Route::resource('/news', GuideNewsController::class);
    Route::resource('/newsDetail', GuideNews_DetailsController::class);
    Route::resource('/package', GuidePackagesController::class);
    Route::resource('/packageDetail', GuidePackage_DetailsController::class);
    Route::resource('/booking', GuideBookingController::class);
    // Route::resource('/profile', AdminProfileController::class);
    Route::resource('/profile', GuideProfileController::class, [
        'names' => 'guideProfile'
    ]);

    Route::get('/guideBlog', [App\Http\Controllers\HomeController::class, 'adminBlog'])->name('guideBlog');
    Route::get('/guideBlogContent{id}', [App\Http\Controllers\HomeController::class, 'adminBlogContent'])->name('guideBlogContent');
    Route::get('/guideBlogGallery{id}', [App\Http\Controllers\HomeController::class, 'adminBlogGallery'])->name('guideBlogGallery');
    Route::post('/guideBlogPost/Comment', [App\Http\Controllers\HomeController::class, 'adminBlogPostComment'])->name('guideBlogPostComment');
    
});
