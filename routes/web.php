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

// ** Vehiculo **

//Alta
Route::get('/cars/register', [App\Http\Controllers\CarController::class, 'create'])->name('car.create');
Route::post('/cars/save', [App\Http\Controllers\CarController::class, 'save'])->name('car.save');

//Editado
Route::get('/cars/edit/{id}', [App\Http\Controllers\CarController::class, 'edit'])->name('car.edit');
Route::post('/cars/update', [App\Http\Controllers\CarController::class, 'update'])->name('car.update');

//Borrado
Route::get('/cars/delete/{id}', [App\Http\Controllers\CarController::class, 'delete'])->name('car.delete');

//Detalle
Route::get('/car/{id}/{idImg?}/{img?}', [App\Http\Controllers\CarDetailController::class, 'detail'])->name('car.detail');

//Listado
Route::get('/cars/list/{id?}/{status?}', [App\Http\Controllers\CarController::class, 'list'])->name('car.list');

//Informe
Route::get('/cars/reportPDF', [App\Http\Controllers\CarController::class, 'report'])->name('car.report');

// ** Imagen **
Route::get('/cars/deleteImg/{id}/{idImg}', [App\Http\Controllers\CarController::class, 'deleteImg'])->name('image.deleteImg');


// ** Usuario **

//Alta
Route::get('/customer/register', [App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');
Route::post('/customers/save', [App\Http\Controllers\CustomerController::class, 'save'])->name('customer.save');

//Editado
Route::get('/customer/edit/{id}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
Route::post('/customer/update', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');

//Borrado
Route::get('/customer/delete/{id?}', [App\Http\Controllers\CustomerController::class, 'delete'])->name('customer.delete');

//Listado
Route::get('/customer/list/{id?}/{status?}', [App\Http\Controllers\CustomerController::class, 'list'])->name('customer.list');

//Informe
Route::get('/customer/reportPDF', [App\Http\Controllers\CustomerController::class, 'report'])->name('customer.report');


// ** Personal Administrativo **

//Alta
Route::get('/user/register', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/users/save', [App\Http\Controllers\UserController::class, 'save'])->name('user.save');

//Editado Basico
Route::get('/user/editConfig', [App\Http\Controllers\UserController::class, 'editConfig'])->name('user.editConfig');
Route::post('/user/updateConfig', [App\Http\Controllers\UserController::class, 'updateConfig'])->name('user.updateConfig');

//Editado Completo
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

//Borrado
Route::get('/user/delete/{id?}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

//Listado
Route::get('/user/list/{id?}/{status?}', [App\Http\Controllers\UserController::class, 'list'])->name('user.list');


// ** Marca **
//Alta
Route::get('/brand/register', [App\Http\Controllers\BrandController::class, 'create'])->name('brand.create');
Route::post('/brand/save', [App\Http\Controllers\BrandController::class, 'save'])->name('brand.save');

//Editado
Route::get('/brand/edit', [App\Http\Controllers\BrandController::class, 'edit'])->name('brand.edit');
Route::post('/brand/update', [App\Http\Controllers\BrandController::class, 'update'])->name('brand.update');

//Listado
Route::get('/brand/list', [App\Http\Controllers\BrandController::class, 'list'])->name('brand.list');

// ** Tipo de Motor **
//Alta
Route::get('/engine/register', [App\Http\Controllers\EngineController::class, 'create'])->name('engine.create');
Route::post('/engine/save', [App\Http\Controllers\EngineController::class, 'save'])->name('engine.save');

//Editado
Route::get('/engine/edit', [App\Http\Controllers\EngineController::class, 'edit'])->name('engine.edit');
Route::post('/engine/update', [App\Http\Controllers\EngineController::class, 'update'])->name('engine.update');

//Listado
Route::get('/engine/list', [App\Http\Controllers\EngineController::class, 'list'])->name('engine.list');

// ** Venta **
//Alta
Route::get('/sale/register/{id}', [App\Http\Controllers\SaleController::class, 'create'])->name('sale.create');
Route::post('/sale/save', [App\Http\Controllers\SaleController::class, 'save'])->name('sale.save');

//Borrado
Route::get('/sale/delete/{idSale}/{idCar}', [App\Http\Controllers\SaleController::class, 'delete'])->name('sale.delete');

//Listado
Route::get('/sale/list', [App\Http\Controllers\SaleController::class, 'list'])->name('sale.list');

//Informe
Route::get('/sale/reportPDF', [App\Http\Controllers\SaleController::class, 'report'])->name('sale.report');