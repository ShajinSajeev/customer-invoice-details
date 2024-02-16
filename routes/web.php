<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('customer-list',[CustomerController::class, 'index'])->name('customer.list');
    Route::get('new-customer',[CustomerController::class, 'create'])->name('customer.new');
    Route::post('new-customer-save',[CustomerController::class, 'store'])->name('customer.store');
    Route::get('customer-edit/{id}',[CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('customer-update',[CustomerController::class, 'update'])->name('customer.update');
    Route::get('customer-destroy/{id}',[CustomerController::class, 'destroy'])->name('customer.destroy');

    Route::get('invoice-list',[InvoiceController::class, 'index'])->name('invoice.list');
    Route::get('new-invoice',[InvoiceController::class, 'create'])->name('invoice.new');
    Route::post('new-invoice-save',[InvoiceController::class, 'store'])->name('invoice.store');
    Route::get('invoice-edit/{id}',[InvoiceController::class, 'edit'])->name('invoice.edit');
    Route::post('invoice-update',[InvoiceController::class, 'update'])->name('invoice.update');
    Route::get('invoice-destroy/{id}',[InvoiceController::class, 'destroy'])->name('invoice.destroy');
});

require __DIR__.'/auth.php';
