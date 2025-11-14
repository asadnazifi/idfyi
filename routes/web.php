<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\admin\NotificationController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\ProfileController;
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


Route::prefix('/')->name('front.')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
    Route::get('/login', [ProfileController::class, 'login'])->name('login');  // نمایش فرم
    Route::get('/register', [ProfileController::class, 'register'])->name('register');  // نمایش فرم
    Route::post('/register', [ProfileController::class, 'RegisterSubmit'])->name('rigester.submit');  // نمایش فرم

    Route::post('/login', [ProfileController::class, 'loginSubmit'])->name('login.submit'); // عملیات لاگین
    Route::get('/orders', [ProfileController::class, 'order'])->name('orders'); // عملیات لاگین

    Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');
    Route::middleware(['front.only'])->group(function () {
        Route::get('/dashbord', [ProfileController::class, 'dashbord'])->name('dashbord');
        Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
        Route::post('/profile', [ProfileController::class, 'ProfileSubmit'])->name('profile.update');
        Route::get('notifications', [ProfileController::class, 'notifications'])->name('notifications');
        Route::post('notifications/toggle', [ProfileController::class, 'toggle'])->name('notifications.toggle');
        Route::get('/support',[ProfileController::class,'support'])->name('support');
        Route::get('/contact',[HomeController::class,'contact'])->name('contact');

    });
});
Route::prefix('admin')->name('admin.')->group(function () {

    // صفحه ورود مدیر
    Route::get('/login', [AdminController::class, 'showLogin'])->name('login');

    // ارسال فرم ورود
    Route::post('/login', [AdminController::class, 'login'])->name('login.submit');

    // تمام مسیرهایی که نیاز به احراز هویت مدیر دارند
    Route::middleware(['admin.only'])->group(function () {

        // مسیر خروج مدیر
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        // داشبورد اصلی
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // --- اینجا مسیرهای دیگر پنل ادمینت رو اضافه می‌کنی ---
        // مدیریت کاربران
        Route::get('/users/list', [AdminController::class, 'users'])->name('users.index');
        Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('users.edit');

        // ثبت ویرایش
        Route::post('/users/{id}/update', [AdminController::class, 'updateUser'])->name('users.update');
        Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
        Route::get('/users/search', [AdminController::class, 'search'])->name('users.search');

        // ذخیره کاربر جدید
        Route::post('/users/store', [AdminController::class, 'storeUser'])->name('users.store');
        // حذف کاربر
        // دسته‌بندی‌ها
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
        Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('users.delete');


        //Order
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{id}', [OrderController::class, 'show'])->name('orders.show');
        Route::delete('orders/{id}', [OrderController::class, 'destroy'])->name('orders.delete');


        //prouct
        Route::get('/product', [ProductController::class, 'index'])->name('products.index');
        Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/product', [ProductController::class, 'store'])->name('products.store');
        Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/product/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

        Route::resource('articles', ArticleController::class);
        Route::resource('media', MediaController::class);


        //notifitions
        Route::get('/notifications', [NotificationController::class, 'index'])->name('notifition.index');
        Route::get('/notifications/create', [NotificationController::class, 'create'])->name('notifications.create');
        Route::post('/notifications', [NotificationController::class, 'store'])->name('notifications.store');
        Route::get('/notifications/{id}/edit', [NotificationController::class, 'edit'])->name('notifications.edit');
        Route::put('/notifications/{id}', [NotificationController::class, 'update'])->name('notifications.update');
        Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.delete');
        // مثال برای بخش پلن‌ها و سفارش‌ها:
        Route::get('/plans', [AdminController::class, 'plans'])->name('plans.index');
    });
});
