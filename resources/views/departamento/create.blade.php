@extends('layouts.app')

@section('title', 'Departamentos')

@section('content') 
    <h1 class="text-center">Crear</h1>
    <h5 class="text-center">Formulario para crear departamento</h5>
    <hr>
    <div class="container">
        <form action="/departamento/store" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    Nombre 
                    <input type="text" class="form-control" name="nombre">
                    @error('nombre') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    Ubicacion 
                    <input type="text" class="form-control" name="ubicacion">
                    @error('ubicacion') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    Jefe 
                    <input type="text" class="form-control" name="jefe">
                    @error('jefe') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    Numero de Empleados 
                    <input type="number" class="form-control" name="numeroEmpleados">
                    @error('numeroEmpleados') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
            </div>
            <div class="col-12 mt-2">
                <button class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection
