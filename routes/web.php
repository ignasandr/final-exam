<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');
Route::get('/companies/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('company.create');
Route::post('/companies', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
Route::get('/companies/{id}', [App\Http\Controllers\CompanyController::class, 'show'])->name('company.show');
Route::put('/companies/{id}', [App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
Route::delete('/companies/{id}', [App\Http\Controllers\CompanyController::class, 'destroy']);

Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
Route::get('/customers/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');
Route::post('/customers', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');
Route::get('/customers/{id}', [App\Http\Controllers\CustomerController::class, 'show'])->name('customer.show');
Route::put('/customers/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');
Route::delete('/customers/{id}', [App\Http\Controllers\CustomerController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
