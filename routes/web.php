<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UsuarioController;
use Illuminate\Support\Facades\Route;
// debes poner la ruta 
use App\Http\Controllers\soporte\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\recursoshumanos\rrhareacontroller;
use App\Http\Controllers\recursoshumanos\Rrhcargocontroller;
use App\Http\Controllers\recursoshumanos\rrhcontratocontroller;
use App\Http\Controllers\recursoshumanos\rrhempleadocontroller;
use App\Http\Controllers\recursoshumanos\rrhprofesioncontroller;
use App\Http\Controllers\recursoshumanos\rrhtipocontratocontroller;
use App\Http\Controllers\soporte\CantonController;
use App\Http\Controllers\soporte\NovedadController;
use App\Http\Controllers\soporte\PdfControllerr;
use App\Http\Controllers\soporte\reportefibra;
use App\Http\Controllers\soporte\reporteradio;
use App\Http\Controllers\soporte\soporteController;

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

Route::get('recuperar', function () {
    return view('recuperar');
});



// controlador ->middleware('auth') esto te ayuda a no ingresar sin antes este autenticado
Route::get('/', HomeController::class)->name('__invoke')->middleware('auth');
// sistema de logueo debes con controlador es logincontroller

Route::get('login',[LoginController::class,'login'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class,'validar'])->name('login.validar');
Route::get('logout', [LoginController::class,'logout'])->name('logout.logout');

Route::get('recuperar', function () {
    return view('recuperar');
});

Route::get('proveedors',[ProveedorController::class,'proveedorlistar'])->name('proveedors.proveedorlistar')->middleware('auth');

//Route::get('users',[UserController::class,'index'])->name('users.users')->middleware('auth');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', Permiso::class);
   Route::resource('users', UserController::class);
  // Route::get('clientes',[ClienteController::class,'clientelistar']);
 //   Route::resource('products', ProductController::class);
});


Route::group(['middleware' => ['auth','role:Administrativo']], function() {
 
// cargos
Route::resource('rhcargos', Rrhcargocontroller::class);
// area
Route::resource('rhareas', rrhareacontroller::class);
// profesiones
Route::resource('rhprofesiones',rrhprofesioncontroller::class);

// Empleados
Route::resource('rhempleados',rrhempleadocontroller::class);
Route::resource('rhtipocontratos',rrhtipocontratocontroller::class);
Route::resource('rhcontratos',rrhcontratocontroller::class);
  // Route::get('clientes',[ClienteController::class,'clientelistar']);
 //   Route::resource('products', ProductController::class);
});



Route::resource('clientes', ClienteController::class)->middleware('auth');

// novedades
Route::resource('novedads', NovedadController::class)->middleware('auth');

Route::resource('soportes', soporteController::class)->middleware('auth');
Route::get('pdfclieente',[PdfControllerr::class,'clientespdfall'])->name('pdfclieente.clientespdfall')->middleware('auth');
Route::get('pdfclieente/{id}',[PdfControllerr::class,'clientegetone'])->name('pdfclieente.clientegetone')->middleware('auth');





Route::get('pdfnovedad',[PdfControllerr::class,'novedadall'])->name('pdfnovedad.novedadall')->middleware('auth');
Route::get('pdfnovedad/{id}',[PdfControllerr::class,'novedadgetone'])->name('pdfnovedad.novedadgetone')->middleware('auth');



// usuario 
Route::get('usuario',[UsuarioController::class,'index'])->name('usuario.index')->middleware('auth');
Route::get('usuario/{user}/editar', [UsuarioController::class,'editar'])->name('usuario.editar')->middleware('auth');
Route::put('usuario/{user}', [UsuarioController::class,'update'])->name('usuario.update')->middleware('auth');


// fibra

Route::get('reporteradio',[reporteradio::class,'index'])->name('reporteradio.index')->middleware('auth');

Route::get('reportefibra',[reportefibra::class,'index'])->name('reportefibra.index')->middleware('auth');

Route::get('pdffreportefibra',[PdfControllerr::class,'soporteallfibra'])->name('pdffreportefibra.soporteallfibra')->middleware('auth');
Route::get('pdffreportefibra/{id}',[PdfControllerr::class,'soportegetonefibra'])->name('pdffreportefibra.soportegetonefibra')->middleware('auth');

// radio pdf 
Route::get('pdffreporteradio',[PdfControllerr::class,'soporteallradio'])->name('pdffreporteradio.soporteallradio')->middleware('auth');
Route::get('pdffreporteradio/{id}',[PdfControllerr::class,'soporteallgetoneradio'])->name('pdffreporteradio.soporteallgetoneradio')->middleware('auth');


// ruta provincia
Route::get('provincias',[ProvinciaController::class,'provincialistar'])->name('provincias.provincialistar')->middleware('auth');
Route::get('provincias/create',[ProvinciaController::class,'create'])->name('provincias.create')->middleware('auth');
Route::post('provincias/ingresar',[ProvinciaController::class,'ingresar'])->name('provincias.ingresar')->middleware('auth');
Route::get('provincias/{provincia}/edit', [ProvinciaController::class,'editar'])->name('provincias.editar')->middleware('auth');
Route::put('provincias/{provincia}', [ProvinciaController::class,'update'])->name('provincias.update')->middleware('auth');


// ruta canton
Route::get('cantons',[CantonController::class,'cantonlistar'])->name('cantons.cantonlistar')->middleware('auth');
Route::get('cantons/create',[CantonController::class,'create'])->name('cantons.create')->middleware('auth');
Route::post('cantons/ingresar',[CantonController::class,'ingresar'])->name('cantons.ingresar')->middleware('auth');
Route::get('cantons/{canton}/edit', [CantonController::class,'editar'])->name('cantons.editar')->middleware('auth');
Route::put('cantons/{canton}', [CantonController::class,'update'])->name('cantons.update')->middleware('auth');

