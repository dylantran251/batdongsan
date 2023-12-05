<?php
// admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryControllerAdmin as CategoryControllerAdminAdmin;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController as AdminPost;

// Front
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PostController as FrontendPost;

// Auth
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Guest
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\FrontendController;
use App\Http\Controllers\Front\LocationController;

use Illuminate\Support\Facades\Route;

// Common
use App\Http\Controllers\Common\CategoryController;
use App\Http\Controllers\Common\TagController as FrontendTag;
use App\Http\Controllers\Common\UploadController;

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
// Route::get('test', function(){
//     return view('test');
// });
// Authentication
Route::group(['prefix'=>'file','as'=>'file.'], function(){
    Route::post('/upload', [UploadController::class, 'upload'])->name('upload');
    Route::delete('/remove', [UploadController::class, 'remove'])->name('remove');
});

Route::middleware('logged')->group(function(){
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register/store', [RegisterController::class, 'store'])->name('register.store');
});

// Admin
Route::group(['prefix'=>'admin','as'=>'admin.', 'middleware' => 'auth'], function(){
    Route::middleware('isAdmin')->group(function(){
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');

        Route::group(['prefix'=>'users', 'as'=> 'users.'], function (){
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/get-items', [UserController::class, 'getItems'])->name('getItems');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::put('{user}/update', [UserController::class, 'update'])->name('update');
            Route::delete('{user}/destroy', [UserController::class, 'destroy'])->name('destroy');
            Route::get('{user}/get', [UserController::class, 'getItem'])->name('getItem');
        });

        Route::group(['prefix'=>'posts', 'as'=> 'posts.'], function (){
           Route::get('/', [AdminPost::class, 'index'])->name('index');
           Route::get('/get-items', [AdminPost::class, 'getItems'])->name('getItems');
           Route::get('{post}/get-item', [AdminPost::class, 'getItem'])->name('getItem');
           Route::get('create', [AdminPost::class, 'create'])->name('create');
           Route::post('store', [AdminPost::class, 'store'])->name('store');
           Route::get('{post}/edit', [AdminPost::class, 'edit'])->name('edit');
           Route::put('{post}/update', [AdminPost::class, 'update'])->name('update');
           Route::delete('{post}/destroy', [AdminPost::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix'=>'categories', 'as'=> 'categories.'], function (){
            Route::get('/', [CategoryControllerAdmin::class, "index"])->name('index');
            Route::post('/', [CategoryControllerAdmin::class, "store"])->name('store');
            Route::get('/get-items', [CategoryControllerAdmin::class, "getItems"])->name('getItems');
            Route::put('{category}/update', [CategoryControllerAdmin::class, "update"])->name('update');
            Route::post('{category}/destroy', [CategoryControllerAdmin::class, "destroy"])->name('destroy');
            Route::get('/get-real-estate-types', [CategoryControllerAdmin::class, 'getRealEstateTypes'])->name('getRealEstateTypes');
        });

        Route::group(['prefix'=>'tags', 'as'=> 'tags.'], function (){
            Route::get('/', [TagController::class, "index"])->name('index');
            Route::post('/', [TagController::class, "store"])->name('store');
            Route::get('/get-items', [TagController::class, "getItems"])->name('getItems');
            Route::put('{category}/update', [TagController::class, "update"])->name('update');
            Route::delete('{category}/destroy', [TagController::class, "destroy"])->name('destroy');
        });
    });
});

// Customer
Route::middleware('auth')->group(function(){
    Route::get('/change-password', [LoginController::class, 'changePasswordView'])->name('change-password');
    Route::put('/change-password/store', [LoginController::class, 'changePasswordStore'])->name('change-password.store');
    Route::group(['prefix' => 'bai-dang', 'as' => 'posts.'], function(){
        Route::get('/', [FrontendPost::class, 'myPosts'])->name('my-posts');
        Route::get('/dang-tin', [FrontendPost::class, 'create'])->name('create');
        Route::get('{post}/edit', [FrontendPost::class, 'edit'])->name('edit');
        Route::put('{post}/update', [FrontendPost::class, 'update'])->name('update');
        Route::post('/store', [FrontendPost::class, 'store'])->name('store');
        Route::post('/add-to-favorite', [FrontendPost::class, 'addPostToFavorite'])->name('add-to-favorite');
        
       
        Route::delete('{post}/destroy', [FrontendPost::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function(){
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::put('{id}/update', [ProfileController::class, 'update'])->name('update');
    });
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});



// Guest
Route::middleware('web')->group(function(){
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/loai-nha-dat', 'getRealEstateTypesByCategory')->name('get-real-estate-types-by-category');
    });

    Route::group(['prefix' => 'tags', 'as' => 'tags.'], function(){
        Route::get('all-tags', [FrontendTag::class, 'allTags'])->name('all-tags');
    });

    Route::controller(LocationController::class)->group(function(){
        Route::get('/provinces', 'getProvincesData')->name('get-provinces');
        Route::get('/districts/{province_id}', 'getDistrictsData')->name('get-districts');
        Route::get('/wards/{district_id}', 'getWardsData')->name('get-wards');
        Route::get('/load-more-provinces', 'loadMoreProvinces')->name('load-more-provinces');
        Route::get('/load-more-wards', 'loadMoreWardsData')->name('load-more-wards');
    });
    
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/tai-them-bai-dang', [HomeController::class, 'loadMorePosts'])->name('load-more-posts');
    
    Route::group(['prefix' => 'bai-dang', 'as' => 'posts.'], function(){
        Route::get('chi-tiet/{post_title}/', [FrontendPost::class, 'postDetails'])->name('details');
        Route::get('{userID}/list-post', [FrontendPost::class, 'userPosts'])->name('posts-by-user');
    });
    Route::group(['prefix' => 'tin-tuc', 'as' => 'news.'], function(){
        Route::get('/', [FrontendPost::class, 'listNews'])->name('index');
        Route::get('/{news_title}', [FrontendPost::class, 'detailNews'])->name('details');
    });
    Route::controller(FrontendController::class)->group(function(){
        Route::get('show-phone-number', 'showPhoneNumber')->name('show-phone-number');
        Route::get('{category_name}/tim-kiem', 'searchPosts')->name('search');
        Route::get('/{category_name}', 'loadPage')->name('loadPage');
    });



});




