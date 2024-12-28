<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\FSController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

Route::get('/admin', function () {
    return view('admin.views.landing');
})->name('admin');

Route::get("/organize/{id}" , [UserProductController::class, 'getData'])->name('organize');
Route::get("/organize/detail/{id}" , [UserProductController::class, 'detail'])->name('organize.detail');
Route::put("/organize/update/{id}" , [UserProductController::class, 'update'])->name('organize.update');
Route::get("/organize/delete/{id}" , [UserProductController::class, 'delete'])->name('organize.delete');
Route::post("/addData" , [UserProductController::class, 'create'])->name('product.create');

Route::get("/admin/user" , [AdminUserController::class, 'getData'])->name('admin.user');
Route::post("/admin/user/create" , [AdminUserController::class, 'create'])->name('admin.user.create');
Route::get("/admin/user/detail/{id}" , [AdminUserController::class, 'detail'])->name('admin.user.detail');
Route::put("/admin/user/update/{id}" , [AdminUserController::class, 'update'])->name('admin.user.update');
Route::get("/admin/user/delete/{id}" , [AdminUserController::class, 'delete'])->name('admin.user.delete');

Route::get("/admin/banner" , [BannerController::class, 'getData'])->name('admin.banner');
Route::get("/admin/banner/up/{id}" , [BannerController::class, 'upBanner'])->name('admin.banner.up');
Route::get("/admin/banner/down/{id}" , [BannerController::class, 'downBanner'])->name('admin.banner.down');

Route::get("/admin/flash" , [FSController::class, 'getData'])->name('admin.flash');
Route::get("/admin/flash/up/{id}" , [FSController::class, 'upflash'])->name('admin.flash.up');
Route::get("/admin/flash/down/{id}" , [FSController::class, 'downflash'])->name('admin.flash.down');

Route::post("/login",[UserController::class,'login'])->name('login');
Route::post("/register",[UserController::class,'register'])->name('register');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::post("/review/{id}",[ReviewController::class,'create'])->name('review.create');

Route::get("/",[ProductController::class,'index']);
Route::get("detail/{id}",[ProductController::class,'detail'])->name('product.detail');
Route::get("search",[ProductController::class,'search']);
Route::post("add-to-cart",[ProductController::class,'addToCart']);
Route::get("cart-list",[ProductController::class,'cartList']);
Route::get("remove-cart/{id}",[ProductController::class,'removeCart']);
Route::get("order-now",[ProductController::class,'orderNow']);
Route::post("place-order",[ProductController::class,'placeOrder']);
Route::get("orders",[ProductController::class,'myOrders']);


