<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EnvioController;
use App\Mail\ContactanosMail;
use Illuminate\Support\Facades\Mail;
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
Route::get("envios/listado/{cliente_id}",[EnvioController::class, 'listado']);
Route::get("productos/qr/{productos}",[ProductoController::class, 'qr'])->name("productos.qr");
Route::get("productos/pdf",[ProductoController::class, 'listadoPdf'])->name("productos.pdf");
Route::resource('productos', 'App\Http\Controllers\ProductoController');
Route::get("clientes/qr/{clientes}",[ClienteController::class, 'qr'])->name("clientes.qr");
Route::get("clientes/pdf",[ClienteController::class, 'listadoPdf'])->name("clientes.pdf");
Route::get("clientes/email/{clientes}",[ClienteController::class, 'enviaremail'])->name("clientes.email");
Route::resource('clientes', 'App\Http\Controllers\ClienteController');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
