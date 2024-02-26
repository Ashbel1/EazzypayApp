<?php

use Illuminate\Support\Facades\Route;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Devices
Route::get('devices/create', [App\Http\Controllers\DeviceController::class, 'create'])->name('devices-create');
Route::post('devices/store', [App\Http\Controllers\DeviceController::class, 'store'])->name('devices-store');
Route::get('devices/show', [App\Http\Controllers\DeviceController::class, 'index'])->name('devices-index');
Route::get('devices/edit{id}', [App\Http\Controllers\DeviceController::class, 'edit'])->name('devices-edit');
Route::put('devices/update{id}', [App\Http\Controllers\DeviceController::class, 'update'])->name('devices-update');
Route::delete('devices/delete{id}', [App\Http\Controllers\DeviceController::class, 'destroy'])->name('devices-delete');
// Merchants
Route::get('merchants/create', [App\Http\Controllers\MerchantController::class, 'create'])->name('merchants-create');
Route::post('merchants/store', [App\Http\Controllers\MerchantController::class, 'store'])->name('merchants-store');
Route::get('merchants/show', [App\Http\Controllers\MerchantController::class, 'index'])->name('merchants-index');
Route::get('merchants/edit{id}', [App\Http\Controllers\MerchantController::class, 'edit'])->name('merchants-edit');
Route::put('merchants/update{id}', [App\Http\Controllers\MerchantController::class, 'update'])->name('merchants-update');
Route::delete('merchants/delete{id}', [App\Http\Controllers\MerchantController::class, 'destroy'])->name('merchants-delete');
// Transactions
Route::get('transactions/create', [App\Http\Controllers\TransactionController::class, 'create'])->name('transactions-create');
Route::post('transactions/store', [App\Http\Controllers\TransactionController::class, 'store'])->name('transactions-store');
Route::get('transactions/show', [App\Http\Controllers\TransactionController::class, 'index'])->name('transactions-index');
Route::get('transactions/edit{id}', [App\Http\Controllers\TransactionController::class, 'edit'])->name('transactions-edit');
Route::put('transactions/update{id}', [App\Http\Controllers\TransactionController::class, 'update'])->name('transactions-update');
Route::delete('transactions/delete{id}', [App\Http\Controllers\TransactionController::class, 'destroy'])->name('transactions-delete');
// filtering transactions
Route::post('/transactions/custom', [App\Http\Controllers\TransactionController::class, 'customSearch'])->name('transactions-custom');

Route::get('/transactions/today', [App\Http\Controllers\TransactionController::class, 'fetchTransactionsToday'])->name('transactions-today');
Route::get('/transactions/last_7_days', [App\Http\Controllers\TransactionController::class, 'fetchTransactionsLastSevenDays'])->name('transactions-last_7_days');
Route::get('/transactions/this_month', [App\Http\Controllers\TransactionController::class, 'fetchTransactionsThisMonth'])->name('transactions-this_month');
Route::get('/transactions/last_month', [App\Http\Controllers\TransactionController::class, 'fetchLastMonthTransactions'])->name('transactions-last_month');
// custom filtering
Route::get('/transactions/filter', [App\Http\Controllers\TransactionController::class, 'filterTransactions'])->name('transactions.filter');





// Users
Route::get('users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users-create');
Route::post('users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users-store');
Route::get('users/show', [App\Http\Controllers\UserController::class, 'index'])->name('users-index');
Route::get('users/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users-edit');
Route::put('users/update{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users-update');
Route::delete('users/delete{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users-delete');
// password change
Route::put('/change-password',[App\Http\Controllers\UserController::class, 'changePassword'] )->name('password-update');