<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Bookings\BookingController;
use App\Http\Controllers\Bookings\myBookingsController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\DentistAdminController;
use App\Http\Controllers\Admin\NewAdminController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\MonthlyController;
use App\Http\Controllers\Admin\YearlyController;
use App\Http\Controllers\Home\UserEditController;


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
    return view('welcome');
});


Auth::routes();
Route::group(['middleware' => ['patient']], function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
    Route::get('add-user-form', [BookingController::class, 'index']);
    Route::post('store-user-form', [BookingController::class, 'storeU']);

    Route::get('/myBookings', [myBookingsController::class, 'index'])->name('myBookings');
    Route::get('deleteBooking/{id}', [myBookingsController::class, 'deleteBooking']);

    Route::get('/userProfile', [UserEditController::class, 'index'])->name('userProfile');
    Route::put('updateUser/{id}', [UserEditController::class, 'update']);

});

Route::group(['middleware' => ['admin']], function (){
    Route::get('deleteAdmin/{id}', [AdminController::class, 'deleteAdmin']);

    Route::get('/adminView', [AdminController::class, 'index'])->name('adminView');
    Route::get('log_out', [AdminController::class, 'log_out']);
    Route::get('search-form', [AdminController::class, 'search']);

    Route::get('/newAdmin', [NewAdminController::class, 'index'])->name('newAdmin');
    Route::get('add-form', [NewAdminController::class, 'index']);
    Route::post('store-form', [NewAdminController::class, 'storeAdmin']);

    Route::get('editBooking/{id}', [AdminController::class, 'editF']);
    Route::put('updateBooking/{id}', [AdminController::class, 'updateF']);

    Route::get('/adminAllBookings', [AdminController::class, 'tableJoin'])->name('allBookings');
    Route::any('/adminSearch', [AdminController::class, 'search'])->name('adminSearch');
    Route::get('/search', [AdminController::class, 'search']);
    Route::post('adminSearch', [AdminController::class, 'search']);

    Route::get('customer_stats', [AdminController::class, 'customerStats'])->name('customerStats');
    Route::get('admin_stats', [AdminController::class, 'adminStats'])->name('adminStats');
    Route::get('editInfo/{id}', [AdminController::class, 'edit']);
    Route::put('updateInfo/{id}', [AdminController::class, 'update']);


    Route::get('dentist_one', [DentistAdminController::class, 'dentist_one'])->name('dentistOne');
    Route::get('dentist_two', [DentistAdminController::class, 'dentist_two'])->name('dentistTwo');
    Route::get('dentist_three', [DentistAdminController::class, 'dentist_three'])->name('dentistThree');

    Route::get('chart_one', [ChartController::class, 'index'])->name('chart_one');
    Route::get('chart_two', [ChartController::class, 'chart_two'])->name('chart_two');
    Route::get('chart_three', [ChartController::class, 'chart_three'])->name('chart_three');

    Route::get('monthly', [MonthlyController::class, 'monthly'])->name('monthly');
    Route::get('yearly', [YearlyController::class, 'yearly'])->name('yearly');
});
