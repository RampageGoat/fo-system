<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestController;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);


// Route::get('/dashboard', function(){
//     return view('dashboard/index', [
//         "title" => "Dashboard",
//         "name" => User::all()
//     ]);
// })->middleware('auth');

Route::resource('/dashboard', DashboardController::class)->middleware('auth');


Route::resource('/booking', BookingController::class)->middleware('auth');
Route::put('/booking/{id}/cancel', [BookingController::class, 'cancel'])->middleware('auth');
Route::put('/booking/{id}/done', [BookingController::class, 'done'])->middleware('auth');
Route::get('/clickSearch', [BookingController::class, 'clickSearch'])->name('booking.clickSearch')->middleware('auth');
Route::get('/getPrice', [BookingController::class, 'getPrice'])->name('booking.getPrice')->middleware('auth');


Route::resource('/customers', CustomersController::class)->middleware('auth');
// Route::get('/search', [CustomersController::class, 'liveSearch'])->name('customers.search')->middleware('auth'); Berhasil


Route::resource('/rooms', RoomsController::class)->middleware('auth');
Route::resource('/report', ReportController::class)->middleware('auth');
Route::get('/cancel', [ReportController::class, 'cancel'])->name('report.cancel')->middleware('auth');

Route::resource('/test', TestController::class)->middleware('auth');
Route::get('/test1', [TestController::class, 'index2'])->middleware('auth');

