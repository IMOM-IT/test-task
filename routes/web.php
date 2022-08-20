<?php

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

Route::get('/', [\App\Http\Controllers\AcoountingCarsController::class, 'index'])->name('cars.index');
Route::get('/create', [\App\Http\Controllers\AcoountingCarsController::class, 'create'])->name('car.create');
Route::post('/store', [\App\Http\Controllers\AcoountingCarsController::class, 'store'])->name('car.store');
Route::put('/update', [\App\Http\Controllers\AcoountingCarsController::class, 'update'])->name('car.update');
Route::post('/delete-car', [\App\Http\Controllers\AcoountingCarsController::class, 'destroy'])->name('car.delete');
Route::get('/edit/{id}', [\App\Http\Controllers\AcoountingCarsController::class, 'edit'])->name('car.edit');
