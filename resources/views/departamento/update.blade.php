{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')
 
{{-- definimos el titulo --}}
@section('title', 'Departamentos')
 
 
{{--Definimos el contenido --}}
@section('content')
<div class="container col-md-4">
    <h1>Modificar</h1>
    <h5>Formulario para modificar departamento</h5>
    <hr>
    <div class="container">
        <form action="/departamento/update/{{ $departamento->codigo }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    Nombre
                    <input type="text" pattern="[A-Za-z]+" class="form-control" name="nombre" value="{{ $departamento->nombre }}">
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    Ubicacion
                    <input type="text" class="form-control" name="ubicacion" value="{{ $departamento->ubicacion }}">
                    @error('ubicacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    Jefe
                    <input type="text" pattern="[A-Za-z/s]+" class="form-control" name="jefe" value="{{ $departamento->jefe }}">
                    @error('jefe')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    Numero de empleados
                    <input type="number" class="form-control" name="numeroEmpleados" value="{{ $departamento->numeroEmpleados }}">
                    @error('numeroEmpleados')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
               
                <div class="col-12 mt-2">
                        <button class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection