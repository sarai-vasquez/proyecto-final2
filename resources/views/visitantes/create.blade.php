@extends('layouts.app')

@section('title', 'Visitantes')

@section('content') 
    <h1 class="text-center">Crear</h1>
    <h5 class="text-center">Formulario para crear visitantes</h5>
    <hr>
    <div class="container">
        <form action="/visitantes/store" method="POST">
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
                Identificacion
                    <input type="text" class="form-control" name="identificacion">
                    @error('identificacion') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    Telefono
                    <input type="tel" class="form-control" name="telefono" pattern="[0-9]{8}">
                    @error('telefono') 
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
            </div>
            <div class="col-12 mt-2">
                <button class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection