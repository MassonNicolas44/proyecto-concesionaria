<?php

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Vehiculo
Route::get('/car/{id}/{idImg?}/{img?}', [App\Http\Controllers\CarController::class, 'detail'])->name('car.detail');

Route::get('/cars/register', [App\Http\Controllers\CarController::class, 'create'])->name('car.create');
Route::post('/cars/save', [App\Http\Controllers\CarController::class, 'save'])->name('car.save');

Route::get('/cars/edit/{id}', [App\Http\Controllers\CarController::class, 'edit'])->name('car.edit');
Route::post('/cars/update', [App\Http\Controllers\CarController::class, 'update'])->name('car.update');

Route::get('/cars/delete/{id}', [App\Http\Controllers\CarController::class, 'delete'])->name('car.delete');

Route::get('/cars/file/{filename}', [App\Http\Controllers\CarController::class, 'getImage'])->name('car.file');

//Imagen
Route::get('/cars/deleteImg/{id}/{idImg}', [App\Http\Controllers\CarController::class, 'deleteImg'])->name('image.deleteImg');

//Usuario
Route::get('/user/config', [App\Http\Controllers\UserController::class, 'config'])->name('user.config');
Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

//Marca
Route::get('/brand/config', [App\Http\Controllers\BrandController::class, 'config'])->name('brand.config');
Route::post('/brand/save', [App\Http\Controllers\BrandController::class, 'save'])->name('brand.save');
Route::post('/brand/update', [App\Http\Controllers\BrandController::class, 'update'])->name('brand.update');

//Tipo de Motor
Route::get('/engine/config', [App\Http\Controllers\EngineController::class, 'config'])->name('engine.config');
Route::post('/engine/save', [App\Http\Controllers\EngineController::class, 'save'])->name('engine.save');
Route::post('/engine/update', [App\Http\Controllers\EngineController::class, 'update'])->name('engine.update');

//Venta
Route::get('/sale/register/{id}', [App\Http\Controllers\SaleController::class, 'create'])->name('sale.create');
Route::post('/sale/save', [App\Http\Controllers\SaleController::class, 'save'])->name('sale.save');
