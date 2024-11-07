<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Concerns\FromCollection;
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

//Utilizacion de resource para todas las vistas de producto
Route::resource('productos', \App\Http\Controllers\TiendaController::class);

//Utilizacion sin resource para cliente
Route::get('clientes', [\App\Http\Controllers\TiendaController::class, 'indexCliente'])->name('clientes.index');
Route::get('clientes/create', [\App\Http\Controllers\TiendaController::class, 'createCliente'])->name('clientes.create');
Route::post('clientes', [\App\Http\Controllers\TiendaController::class, 'storeCliente'])->name('clientes.store');
Route::get('clientes/{id}', [\App\Http\Controllers\TiendaController::class, 'showCliente'])->name('clientes.show');
Route::get('clientes/{id}/edit', [\App\Http\Controllers\TiendaController::class, 'editCliente'])->name('clientes.edit');
Route::put('clientes/{id}', [\App\Http\Controllers\TiendaController::class, 'updateCliente'])->name('clientes.update');
Route::delete('clientes/{id}', [\App\Http\Controllers\TiendaController::class, 'destroyCliente'])->name('clientes.destroy');


//asignaciones
Route::get('asignaciones', [\App\Http\Controllers\TiendaController::class, 'indexAsignaciones'])->name('asignaciones.index');
Route::get('asignaciones/form', [\App\Http\Controllers\TiendaController::class, 'createAsignacion'])->name('asignaciones.create');
Route::post('asignaciones', [\App\Http\Controllers\TiendaController::class, 'storeAsignacion'])->name('asignaciones.store');


// Ruta de exportar
Route::get('producto', [\App\Http\Controllers\TiendaController::class, 'exportProductos'])->name('productos.export');
Route::get('cliente', [\App\Http\Controllers\TiendaController::class, 'exportClientes'])->name('clientes.export');
Route::get('asignacion', [\App\Http\Controllers\TiendaController::class, 'exportAsignaciones'])->name('asignaciones.export');
