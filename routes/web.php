<?php

use App\http\Controllers\WebsiteController;
use App\http\Controllers\AuthController;
use App\http\Controllers\DashboardController;
use App\http\Controllers\CategoryController;
use App\http\Controllers\productController;
use App\http\Controllers\BannerController;
use App\http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;



Route::get('/',[WebsiteController::class,'index'])->name('website.index');
Route::get('/front_login', [WebsiteController::class, 'front_login'])->name('website.front_login');
Route::get('/shop',[WebsiteController::class,'shop'])->name('website.shop');
Route::get('/shop/category/{id}',[WebsiteController::class,'shopcategory'])->name('website.shopcategory');
Route::get('/cart',[WebsiteController::class,'cart'])->name('website.cart');
Route::post('/addToCart', [WebsiteController::class, 'addToCart'])->name('website.addToCart');
Route::get('/deletecartproduct/{id}', [WebsiteController::class, 'deletecartproduct'])->name('website.deletecartproduct');
Route::get('/shop_detail/{id?}',[WebsiteController::class,'shop_detail'])->name('website.shop_detail');
Route::get('/checkout',[WebsiteController::class,'checkout'])->name('website.checkout');
Route::get('/login',[WebsiteController::class,'login'])->name('website.login');
Route::get('/register',[WebsiteController::class,'register'])->name('website.register');
Route::post('/registerUser',[WebsiteController::class,'registerUser'])->name('registerUser');
Route::post('/loginUser',[WebsiteController::class,'loginUser'])->name('loginUser');
Route::get('/logout',[WebsiteController::class,'logout'])->name('logout');



//admin routes
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/authenticate',[AuthController::class, 'authenticate'])->name('authenticate');

    Route::middleware(['auth'])->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/orders', [OrderController::class,'orders'])->name('orders');
        Route::resource('categories', CategoryController::class,);
        Route::resource('products', productController::class,);
        Route::resource('banners', BannerController::class,);

    });
});
