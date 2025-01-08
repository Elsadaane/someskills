<?php

use App\Http\Controllers\CatogeryOfProductArshefController;
use App\Http\Controllers\CatogryArshefController;
use App\Http\Controllers\CatogryProductController;
use App\Http\Controllers\pages\AboutController;
use App\Http\Controllers\pages\ContactUsController;
use App\Http\Controllers\pages\SettingController;
use App\Http\Controllers\PostsArshefController;
use App\Http\Controllers\Product_catogryArshefController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsCategoryController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\frontend\PagesController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\ProductController;

/////////////////////back/////////////////////////////////////////
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'auth' , 'verified'],
    ],
    function () {
        Route::get('/', function () {
            return view('backend.home');
        });

        Route::get('/about', function () {
            return view('about');
        });
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // توجيه لوحة التحكم
        Route::get('/dashboard', [DashboardController::class , 'index'])->name('dashboard');
        Route::get('/backend', function () {
            return view('backend.home');
        })->name('backend.home');

        //setting
        Route::get('/setting', [SettingController::class , 'index'])->name('setting.index');
        Route::put('/setting/{id}', [SettingController::class , 'update'])->name('setting.update');
        //ABOUT
        Route::get('/About', [AboutController::class , 'index'])->name('About.index');
        Route::put('/About/{id}', [AboutController::class , 'update'])->name('About.update');
        //Contact_us
        Route::get('/Contact_us', [ContactUsController::class , 'index'])->name('Contact_us.index');
        Route::put('/Contact_us/{id}', [ContactUsController::class , 'update'])->name('Contact_us.update');
        //posts
        Route::resource('/category' , PostsCategoryController::class);
        Route::resource('/posts' , PostController::class);
        Route::get('/category/allProduct/{id}' , [PostsCategoryController::class , 'allproduct'])->name('category.allProduct');
        Route::resource('/categoryArchives' , CatogryArshefController::class);
        Route::resource('/PostArchives' , PostsArshefController::class);
        Route::resource('/CategoryOfProduct' , CategoryProductController::class);
        Route::resource('/CategoryOfProductArchives'  , CatogeryOfProductArshefController::class);
        Route::get('/AllProductBelong/{id}' ,[CategoryProductController::class , 'allproductbelong'] )->name('CategoryOfProduct.allproductbelong');
        Route::resource('/Product' , ProductController::class);
        Route::resource('/ProductCategoryArchives'  , Product_catogryArshefController::class);
        Route::resource('/hero' , HeroController::class );

    }

);

/////////////////////////// front ///////////////////////////////////////////////
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){

   Route::get("/" ,[PagesController::class , 'home'])->name('home');

   Route::get('/categories' , [PagesController::class , 'Category'])->name('Category');
   Route::get('/all-post' , [PagesController::class , 'posts'])->name('posts');
   Route::get('/category-details' , [PagesController::class , 'Category_details'])->name('Category_details');
   //always yse small letters in route  seo

   // how?????????
   Route::get('/all-posts-belong-category/{slug}' , [PagesController::class , 'allPostsBelongCategory'])->name('allPostsBelongCategory');
   //use slug in here
   Route::get('/search', [PagesController::class, 'search'])->name('search');
   Route::get('/about', [FrontendController::class, 'about'])->name('about');
   Route::get('/contact', [FrontendController::class, 'showContactForm'])->name('contact');
   Route::post('/contact', [FrontendController::class, 'submitContactForm'])->name('contact.submit');
   ///////////////////////////////////product/////////////////////////////////////////////////
   Route::get('/product-Category' , [PagesController::class , 'product_Category'])->name('product-Category');
   Route::get('/product' , [PagesController::class , 'product'])->name('product');
   Route::get('/category-details/{slug}' , [PagesController::class , 'categoryDetails'])->name('category-details');
   Route::get('/search-category' , [PagesController::class , 'search_category'])->name('search-category');
   Route::get('/products-by-category' , [PagesController::class , 'products_byCategory'])->name('products-byCategory');


});


Route::redirect('/register', '/login');

// new tabel hero head title suptitle image video button
// edite view ------
// slug
// small name rout -------

// تضمين توجيهات المصادقة
require __DIR__ . '/auth.php';