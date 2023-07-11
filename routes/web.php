<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\HomeControllerz;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\BlogController;

use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\RegisterController;
use App\Http\Controllers\frontend\LoginController;
use App\Http\Controllers\frontend\BlogFrontendController;
use App\Http\Controllers\frontend\AccountController;
use App\Http\Controllers\frontend\MyProductController;
use App\Http\Controllers\frontend\BrandController;
use App\Http\Controllers\frontend\ProductDetailController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CkeckoutController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\frontend\MailCheckoutController;
use App\Http\Controllers\frontend\SearchProductController;
use App\Http\Controllers\frontend\SearchAdvancedController;
use App\Http\Controllers\frontend\SearchPriceController;



use Illuminate\Support\Facades\Auth;


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



//admin

Auth::routes();

Route::group([
    'middleware' => ['admin']
], function () {
    //dasboad
    Route::get('/dashboard',[App\Http\Controllers\admin\DashboardController::class,'index'])->name('dashboard');
    //profile
    Route::get('/profile',[App\Http\Controllers\admin\UserController::class,'index'])->name('profile');
    Route::post('/profile',[App\Http\Controllers\admin\UserController::class,'update'])->name('profile');
    //country
    Route::get('/country',[App\Http\Controllers\admin\CountryController::class,'index'])->name('country');

    Route::get('/addcountry',[App\Http\Controllers\admin\CountryController::class,'create']);
    Route::post('/addcountry',[App\Http\Controllers\admin\CountryController::class,'insert']);

    Route::get('/editcountry/{id_country}',[App\Http\Controllers\admin\CountryController::class,'edit'])->name('editcountry');
    Route::post('/editcountry/{id_country}',[App\Http\Controllers\admin\CountryController::class,'update'])->name('editcountry');

    Route::delete('/deletecountry/{id_country}',[App\Http\Controllers\admin\CountryController::class,'destroy'])->name('deletecountry');
    //category
    Route::get('/category',[App\Http\Controllers\admin\CategoryController::class,'index'])->name('category');
    Route::get('/addcategory',[App\Http\Controllers\admin\CategoryController::class,'create']);
    Route::post('/addcategory',[App\Http\Controllers\admin\CategoryController::class,'insert']);

    Route::get('/editcategory/{id}',[App\Http\Controllers\admin\CategoryController::class,'edit']);
    Route::post('/editcategory/{id}',[App\Http\Controllers\admin\CategoryController::class,'update']);
    Route::delete('/deletecategory/{id}',[App\Http\Controllers\admin\CategoryController::class,'destroy']);
    //brand
    Route::get('/brand',[App\Http\Controllers\admin\BrandController::class,'index'])->name('brand');
    Route::get('/addbrand',[App\Http\Controllers\admin\BrandController::class,'create']);
    Route::post('/addbrand',[App\Http\Controllers\admin\BrandController::class,'insert']);

    Route::get('/editbrand/{id}',[App\Http\Controllers\admin\BrandController::class,'edit']);
    Route::post('/editbrand/{id}',[App\Http\Controllers\admin\BrandController::class,'update']);
    Route::delete('/deletebrand/{id}',[App\Http\Controllers\admin\BrandController::class,'destroy']);
    //fronend
    Route::get('/blog',[App\Http\Controllers\admin\BlogController::class,'index'])->name('blog');;

    Route::get('/addblog',[App\Http\Controllers\admin\BlogController::class,'create'])->name('addblog');
    Route::post('/addblog',[App\Http\Controllers\admin\BlogController::class,'insert'])->name('addblog');

    Route::get('/editblog/{id_blog}',[App\Http\Controllers\admin\BlogController::class,'edit'])->name('editblog');
    Route::post('/editblog/{id_blog}',[App\Http\Controllers\admin\BlogController::class,'update'])->name('editblog')
    ;

    Route::delete('/deleteblog/{id_blog}',[App\Http\Controllers\admin\BlogController::class,'destroy'])->name('deleteblog');
});


Route::group([
    // chỉ vao folder frontend
    'namespace' => 'frontend'
], function () {
    Route::get('/member/home',[App\Http\Controllers\frontend\FrontendController::class,'index'])->name('member_home');

    Route::get('/member/register',[App\Http\Controllers\frontend\RegisterController::class,'create'])->name('member_register');
    Route::post('/member/register',[App\Http\Controllers\frontend\RegisterController::class,'insert']);

    Route::get('/member/login',[App\Http\Controllers\frontend\LoginController::class,'index'])->name('Memberlogin');
    Route::post('/member/login',[App\Http\Controllers\frontend\LoginController::class,'login'])->name('Memberlogin');
    Route::get('/member/logout',[App\Http\Controllers\frontend\LoginController::class,'logout']);

    Route::get('/frontend/blog',[App\Http\Controllers\frontend\BlogFrontendController::class,'index']);

    Route::get('/blogdetail/{id_blog}',[App\Http\Controllers\frontend\BlogFrontendController::class,'detail']);
    Route::post('/blogdetail/rate',[App\Http\Controllers\frontend\BlogFrontendController::class,'insertRate']);
    //comment
    Route::get('/blogdetail/comment',[App\Http\Controllers\frontend\BlogFrontendController::class,'createComment']);
    Route::post('/blogdetail/comment',[App\Http\Controllers\frontend\BlogFrontendController::class,'insertComment']);

    //account
    Route::get('/member/account',[App\Http\Controllers\frontend\AccountController::class,'index']);
    Route::post('/member/account',[App\Http\Controllers\frontend\AccountController::class,'updateAccount']);

    Route::get('/member/myproduct',[App\Http\Controllers\frontend\MyProductController::class,'index'])->name('myproduct');
    Route::get('/member/addproduct',[App\Http\Controllers\frontend\MyProductController::class,'create']);
    Route::post('/member/addproduct',[App\Http\Controllers\frontend\MyProductController::class,'insert']);

    Route::get('/member/editproduct/{id_product}',[App\Http\Controllers\frontend\MyProductController::class,'edit']);
    Route::post('/member/editproduct/{id_product}',[App\Http\Controllers\frontend\MyProductController::class,'update']);

    Route::delete('/member/editproduct/{id_product}',[App\Http\Controllers\frontend\MyProductController::class,'destroy']);

    //prodcutDetail
    Route::get('/member/productdetail/{id_product}',[App\Http\Controllers\frontend\ProductDetailController::class,'index']);
    Route::post('/member/addtocart',[App\Http\Controllers\frontend\ProductDetailController::class,'addToCart']);

    //cart
    Route::get('/member/cart',[App\Http\Controllers\frontend\CartController::class,'index']);
    Route::post('/member/cart',[App\Http\Controllers\frontend\CartController::class,'upDownQty']);
    Route::delete('/member/cart/delete/{id_product}',[App\Http\Controllers\frontend\CartController::class,'destroy']);
    //checkout
    Route::get('/member/checkout',[App\Http\Controllers\frontend\CkeckoutController::class,'index'])->name('checkout');
    Route::post('/member/checkout',[App\Http\Controllers\frontend\CkeckoutController::class,'upDownQty']);
    Route::post('/member/checkout/register',[App\Http\Controllers\frontend\CkeckoutController::class,'insert']);

    //test mail
    Route::get('/test',[App\Http\Controllers\MailController::class,'index']);

    //mailcheckout
    Route::post('/member/mailcheckout',[App\Http\Controllers\frontend\MailCheckoutController::class,'index']);

    //productSearch
    Route::get('/member/searchproduct',[App\Http\Controllers\frontend\SearchProductController::class,'index']);

    //search advanced

    Route::match(array('GET','POST'), '/member/searchadvanced',[App\Http\Controllers\frontend\SearchAdvancedController::class,'index']);
    //search price
    Route::post('/member/searchprice',[App\Http\Controllers\frontend\SearchPriceController::class,'index']);
    
});


