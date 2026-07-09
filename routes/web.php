<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/membership', MembershipController::class);
Route::resource('/member', MemberController::class);
Route::resource('/invoice', InvoiceController::class);
Route::get('/generate-invoice', [InvoiceController::class, 'generate'])
    ->name('invoice.generate');

Route::resource('payment', PaymentController::class);
Route::post('/payment/{id}', [PaymentController::class, 'pay'])->name('payment.pay');