{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')
 
{{-- definimos el titulo --}}
@section('title', 'Empleados')
 
 
{{--Definimos el contenido --}}
@section('content')
<div class="container col-md-4">
    <h1>Modificar</h1>
    <h5>Formulario para modificar empleados</h5>
    <hr>
    <div class="container">
        <form action="/empleados/update/{{$empleados->codigo}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
            <div class="col-6">
                    Nombre 
                    <input type="text" class="form-control" name="nombre" value="{{$empleados->nombre}}">
                    @error('nombre') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                Correo
                    <input type="email" class="form-control" name="correo"  value="{{$empleados->correo}}">
                    @error('correo') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    Departamento
                    <select name="departamento" id="" class="form-control"> 
                        @foreach ($departamento as $item)  
                            <option value="{{$item->codigo}}">{{$item->nombre}}</option> 
                        @endforeach   
                    </select> 
                    @error('departamento') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
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