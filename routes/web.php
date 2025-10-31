<?php

use App\Http\Controllers\admin\AdminController;
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

// Route::get('/', function () {
//     return view('admin.dashboard');
// });
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

        // حذف کاربر
        Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('users.delete');
        // مثال برای بخش پلن‌ها و سفارش‌ها:
        Route::get('/plans', [AdminController::class, 'plans'])->name('plans.index');
        Route::get('/orders', [AdminController::class, 'orders'])->name('orders.index');
    });
});
