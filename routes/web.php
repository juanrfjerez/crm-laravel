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
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\CompraController;

Route::resource('clientes', ClienteController::class);
Route::resource('productos', ProductoController::class);
Route::resource('proveedores', ProveedorController::class);
Route::resource('ventas', VentaController::class);
Route::resource('compras', CompraController::class);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return 'Bienvenido Admin';
    });
});