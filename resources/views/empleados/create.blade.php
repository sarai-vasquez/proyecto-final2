@extends('layouts.app')

@section('title', 'Empleados')

@section('content') 
    <h1 class="text-center">Crear</h1>
    <h5 class="text-center">Formulario para crear empleados</h5>
    <hr>
    <div class="container">
        <form action="/empleados/store" method="POST">
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
                Correo
                    <input type="email" class="form-control" name="correo">
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
            </div>
            <div class="col-12 mt-2">
                <button class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection