<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');


    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::group(['middleware' => ['role:admin,kasir']], function () {

    Route::get('customers', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');
    Route::get('customers/add', [\App\Http\Controllers\CustomerController::class, 'create'])->name('customers.create');
    Route::post('customers', [\App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
    Route::get('customers/edit/{id}', [\App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('customers/edit/{id}', [\App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
    Route::delete('customers/delete/{id}', [\App\Http\Controllers\CustomerController::class, 'destroy'])->name('customers.destroy');
});

    Route::group(['middleware' => ['role:admin,gudang,kasir']], function () {
        Route::get('spareparts', [\App\Http\Controllers\SparepartController::class, 'index'])->name('spareparts.index');
        Route::get('spareparts/add', [\App\Http\Controllers\SparepartController::class, 'create'])->name('spareparts.create');
        Route::post('spareparts/add', [\App\Http\Controllers\SparepartController::class, 'store'])->name('spareparts.store');
        Route::get('spareparts/edit/{id}', [\App\Http\Controllers\SparepartController::class, 'edit'])->name('spareparts.edit');
        Route::put('spareparts/edit/{id}', [\App\Http\Controllers\SparepartController::class, 'update'])->name('spareparts.update');
        Route::delete('spareparts/delete/{id}', [\App\Http\Controllers\SparepartController::class, 'destroy'])->name('spareparts.destroy');
    });

Route::group(['middleware' => ['role:admin']], function () {

    Route::get('jasas', [\App\Http\Controllers\JasaController::class, 'index'])->name('jasas.index');
    Route::get('jasas/add', [\App\Http\Controllers\JasaController::class, 'create'])->name('jasas.create');
    Route::post('jasas/add', [\App\Http\Controllers\JasaController::class, 'store'])->name('jasas.store');
    Route::get('jasas/edit/{id}', [\App\Http\Controllers\JasaController::class, 'edit'])->name('jasas.edit');
    Route::put('jasas/edit/{id}', [\App\Http\Controllers\JasaController::class, 'update'])->name('jasas.update');
    Route::delete('jasas/delete/{id}', [\App\Http\Controllers\JasaController::class, 'destroy'])->name('jasas.destroy');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('users/edit/{id}', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('users/edit/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');

});
Route::group(['middleware' => ['role:admin,kasir,gudang']], function () {

    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/add', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions/add', [TransactionController::class, 'store'])->name('transactions.store');
    Route::delete('/transactions/delete/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
    Route::get('/transactions/print/{id}', [TransactionController::class, 'show'])->name('transactions.show');

});
    Route::get('karyawans',[\App\Http\Controllers\KaryawanController::class, 'index'])->name('karyawans.index');

});
