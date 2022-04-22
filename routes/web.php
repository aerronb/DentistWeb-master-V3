<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Bookings\BookingController;
use App\Http\Controllers\Bookings\myBookingsController;
use App\Http\Controllers\Home\HomeController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
Route::get('add-form', [BookingController::class, 'index']);
Route::post('store-form', [BookingController::class, 'store']);


Route::get('/myBookings', [myBookingsController::class, 'index'])->name('myBookings');
Route::get('editBooking/{id}', [myBookingsController::class, 'edit']);
Route::put('updateBooking/{id}', [myBookingsController::class, 'update']);

Route::get('/adminView', [AdminController::class, 'index'])->name('adminView');
Route::get('log_out', [AdminController::class, 'log_out']);
Route::get('search-form', [AdminController::class, 'search']);

Route::get('/adminAllBookings', [AdminController::class, 'tableJoin'])->name('allBookings');
Route::any('/adminSearch', [AdminController::class, 'search'])->name('adminSearch');
Route::get('/search', [AdminController::class, 'search']);
Route::post('adminSearch', [AdminController::class, 'search']);

Route::get('customer_stats', [AdminController::class, 'customerStats'])->name('customerStats');
Route::get('admin_stats', [AdminController::class, 'adminStats'])->name('adminStats');
Route::get('editInfo/{id}', [AdminController::class, 'edit']);
Route::put('updateInfo/{id}', [AdminController::class, 'update']);

Route::get('dentist_one', [AdminController::class, 'dentist_one'])->name('dentistOne');
Route::get('dentist_two', [AdminController::class, 'dentist_two'])->name('dentistTwo');



