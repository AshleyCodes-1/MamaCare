<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\WeeklyDataController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AppointmentController;
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


Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('PregnancyStages', [HomeController::class, 'PregnancyStages'])->name('PregnancyStages');
Route::get('blog-details/{id}', [HomeController::class, 'blogDetails'])->name('blog-details');
Route::get('doctor-details/{id}', [HomeController::class, 'doctorDetails'])->name('doctor-details');
Route::get('products', [HomeController::class, 'products'])->name('products');



Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::post('book-ap', [UserController::class, 'bookAp'])->name('book-ap');
    Route::get('add-cart/{id}', [UserController::class, 'addCart'])->name('add-cart');
    Route::get('cart', [UserController::class, 'cart'])->name('cart');
    Route::get('remove-cart/{id}', [UserController::class, 'removeCart'])->name('remove-cart');
    Route::get('checkout', [UserController::class, 'checkout'])->name('checkout');
    Route::get('orders', [UserController::class, 'orders'])->name('orders');
    Route::get('my-appointment', [UserController::class, 'myAppointment'])->name('my-appointment');


    Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
        Route::get("blogs", [BlogController::class, 'index'])->name('blogs');
        Route::get("add", [BlogController::class, 'create'])->name('add');
        Route::post("save", [BlogController::class, 'store'])->name('save');
        Route::get("edit/{id}", [BlogController::class, 'edit'])->name('edit');
        Route::get("delete/{id}", [BlogController::class, 'destroy'])->name('delete');
        Route::post("update", [BlogController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'feedback', 'as' => 'feedback.'], function () {
        Route::get("show", [UserController::class, 'feedbackShow'])->name('show');
        Route::post("save", [UserController::class, 'feedbackUpdate'])->name('save');
    });

});



require __DIR__.'/adminAuth.php';
Route::middleware(['auth:admin'])->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('users', [AdminController::class, 'userList'])->name('users');

        Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
            Route::get("blogs", [BlogController::class, 'adminIndex'])->name('blogs');
            Route::get("edit/{id}", [BlogController::class, 'adminEdit'])->name('edit');
            Route::post("update", [BlogController::class, 'adminUpdate'])->name('update');
            Route::get("delete/{id}", [BlogController::class, 'adminDestroy'])->name('delete');
        });

        Route::group(['prefix' => 'feedback', 'as' => 'feedback.'], function () {
            Route::get("show", [UserController::class, 'adminFeedbackShow'])->name('show');
        });

        Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
            Route::get("index", [ProductController::class, 'index'])->name('index');
            Route::get("orders", [ProductController::class, 'orders'])->name('orders');
            Route::get("add", [ProductController::class, 'create'])->name('add');
            Route::post("save", [ProductController::class, 'store'])->name('save');
            Route::get("edit/{id}", [ProductController::class, 'edit'])->name('edit');
            Route::get("delete/{id}", [ProductController::class, 'destroy'])->name('delete');
            Route::post("update", [ProductController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'doctor', 'as' => 'doctor.'], function () {
            Route::get("index", [DoctorController::class, 'index'])->name('index');
            Route::get("add", [DoctorController::class, 'create'])->name('add');
            Route::post("save", [DoctorController::class, 'store'])->name('save');
            Route::get("edit/{id}", [DoctorController::class, 'edit'])->name('edit');
            Route::get("delete/{id}", [DoctorController::class, 'destroy'])->name('delete');
            Route::post("update", [DoctorController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'city', 'as' => 'city.'], function () {
            Route::get("index", [CityController::class, 'index'])->name('index');
            Route::get("add", [CityController::class, 'create'])->name('add');
            Route::post("save", [CityController::class, 'store'])->name('save');
            Route::get("edit/{id}", [CityController::class, 'edit'])->name('edit');
            Route::get("delete/{id}", [CityController::class, 'destroy'])->name('delete');
            Route::post("update", [CityController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'week', 'as' => 'week.'], function () {
            Route::get("index", [WeeklyDataController::class, 'index'])->name('index');
            Route::get("add", [WeeklyDataController::class, 'create'])->name('add');
            Route::post("save", [WeeklyDataController::class, 'store'])->name('save');
            Route::get("edit/{id}", [WeeklyDataController::class, 'edit'])->name('edit');
            Route::get("delete/{id}", [WeeklyDataController::class, 'destroy'])->name('delete');
            Route::post("update", [WeeklyDataController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'appointment', 'as' => 'appointment.'], function () {
            Route::get("history", [AppointmentController::class, 'history'])->name('history');
            Route::get("complete/{id}", [AppointmentController::class, 'complete'])->name('complete');
            Route::get("index", [AppointmentController::class, 'index'])->name('index');
            Route::get("add", [AppointmentController::class, 'create'])->name('add');
            Route::post("save", [AppointmentController::class, 'store'])->name('save');
            Route::get("edit/{id}", [AppointmentController::class, 'edit'])->name('edit');
            Route::get("delete/{id}", [AppointmentController::class, 'destroy'])->name('delete');
            Route::post("update", [AppointmentController::class, 'update'])->name('update');
        });
    });
});

require __DIR__.'/auth.php';