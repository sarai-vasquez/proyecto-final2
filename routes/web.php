<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\TramitesController;
use App\Http\Controllers\VisitasController;
use App\Http\Controllers\VisitantesController;
use App\Http\Controllers\ReportController;

Route::get('/home', function () {
    return view('home');
});

Route::get('departamento/show', [DepartamentoController::class, 'index']); 
Route::get('departamento/create', [DepartamentoController::class, 'create']); 
Route::post('/departamento/store', [DepartamentoController::class, 'store']);
Route::get('departamento/edit/{departamento}', [DepartamentoController::class, 'edit']);   
Route::put('departamento/update/{departamento}', [DepartamentoController::class, 'update']); 
Route::delete('/departamento/destroy/{id}', [DepartamentoController::class, 'destroy']);

Route::get('/empleados/show', [EmpleadosController::class, 'index']); 
Route::get('/empleados/create', [EmpleadosController::class, 'create']);
Route::post('/empleados/store', [EmpleadosController::class, 'store']);
Route::get('empleados/edit/{empleados}', [EmpleadosController::class, 'edit']);   
Route::put('empleados/update/{empleados}', [EmpleadosController::class, 'update']); 
Route::delete('empleados/destroy/{id}', [EmpleadosController::class, 'destroy']);

Route::get('/estado/show', [EstadoController::class, 'index']); 
Route::get('/estado/create', [EstadoController::class, 'create']);
Route::post('/estado/store', [EstadoController::class, 'store']);
Route::get('estado/edit/{estado}', [EstadoController::class, 'edit']);   
Route::put('estado/update/{estado}', [EstadoController::class, 'update']); 
Route::delete('estado/destroy/{id}', [EstadoController::class, 'destroy']);

Route::get('/tramites/show', [TramitesController::class, 'index']); 
Route::get('/tramites/create', [TramitesController::class, 'create']);
Route::post('/tramites/store', [TramitesController::class, 'store']);
Route::get('tramites/edit/{tramites}', [TramitesController::class, 'edit']);   
Route::put('tramites/update/{tramites}', [TramitesController::class, 'update']); 
Route::delete('tramites/destroy/{id}', [TramitesController::class, 'destroy']);

Route::get('/visitas/show', [VisitasController::class, 'index']); 
Route::get('/visitas/create', [VisitasController::class, 'create']);
Route::post('/visitas/store', [VisitasController::class, 'store']);
Route::get('visitas/edit/{visitas}', [VisitasController::class, 'edit']);   
Route::put('visitas/update/{visitas}', [VisitasController::class, 'update']); 
Route::delete('visitas/destroy/{id}', [VisitasController::class, 'destroy']);

Route::get('/visitantes/show', [VisitantesController::class, 'index']); 
Route::get('/visitantes/create', [VisitantesController::class, 'create']);
Route::post('/visitantes/store', [VisitantesController::class, 'store']);
Route::get('visitantes/edit/{visitantes}', [VisitantesController::class, 'edit']);   
Route::put('visitantes/update/{visitantes}', [VisitantesController::class, 'update']); 
Route::delete('visitantes/destroy/{id}', [VisitantesController::class, 'destroy']);

Route::get('/reporte', [ReportController::class,'reporteDep']);
Route::get('/reporteEmp', [ReportController::class,'reporteEmp']);
Route::get('/reporteEst', [ReportController::class,'reporteEst']);
Route::get('/reporteTram', [ReportController::class,'reporteTram']);
Route::get('/reporteVitt', [ReportController::class,'reporteVitt']);
Route::get('/reporteVis', [ReportController::class,'reporteVis']);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
