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

Route::get('/cars/list', [App\Http\Controllers\CarController::class, 'list'])->name('car.list');

//Imagen
Route::get('/cars/deleteImg/{id}/{idImg}', [App\Http\Controllers\CarController::class, 'deleteImg'])->name('image.deleteImg');

//Usuario
Route::get('/user/editAdmin', [App\Http\Controllers\UserController::class, 'editAdmin'])->name('user.editAdmin');
Route::post('/user/updateAdmin', [App\Http\Controllers\UserController::class, 'updateAdmin'])->name('user.updateAdmin');

Route::get('/user/editUser/{id}', [App\Http\Controllers\UserController::class, 'editUser'])->name('user.editUser');
Route::post('/user/updateUser', [App\Http\Controllers\UserController::class, 'updateUser'])->name('user.updateUser');

Route::get('/user/list', [App\Http\Controllers\UserController::class, 'list'])->name('user.list');

//Marca
Route::get('/brand/register', [App\Http\Controllers\BrandController::class, 'create'])->name('brand.create');
Route::post('/brand/save', [App\Http\Controllers\BrandController::class, 'save'])->name('brand.save');

Route::get('/brand/edit', [App\Http\Controllers\BrandController::class, 'edit'])->name('brand.edit');
Route::post('/brand/update', [App\Http\Controllers\BrandController::class, 'update'])->name('brand.update');

Route::get('/brand/list', [App\Http\Controllers\BrandController::class, 'list'])->name('brand.list');

//Tipo de Motor
Route::get('/engine/register', [App\Http\Controllers\EngineController::class, 'create'])->name('engine.create');
Route::post('/engine/save', [App\Http\Controllers\EngineController::class, 'save'])->name('engine.save');

Route::get('/engine/edit', [App\Http\Controllers\EngineController::class, 'edit'])->name('engine.edit');
Route::post('/engine/update', [App\Http\Controllers\EngineController::class, 'update'])->name('engine.update');

Route::get('/engine/list', [App\Http\Controllers\EngineController::class, 'list'])->name('engine.list');

//Venta
Route::get('/sale/register/{id}', [App\Http\Controllers\SaleController::class, 'create'])->name('sale.create');
Route::post('/sale/save', [App\Http\Controllers\SaleController::class, 'save'])->name('sale.save');
