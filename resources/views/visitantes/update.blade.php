{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')
 
{{-- definimos el titulo --}}
@section('title', 'Visitantes')
 
 
{{--Definimos el contenido --}}
@section('content')
<div class="container col-md-4">
    <h1>Modificar</h1>
    <h5>Formulario para modificar visitantes</h5>
    <hr>
    <div class="container">
        <form action="/visitantes/update/{{$visitantes->codigo }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    Nombre
                    <input type="text" pattern="[A-Za-z/s]+" class="form-control" name="nombre" value="{{$visitantes->nombre }}">
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    Identificacion
                    <input type="text" pattern="[0-9]{8}-[0-9]{1}" class="form-control" name="identificacion" value="{{$visitantes->identificacion}}">
                    @error('identificacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    Telefono
                    <input type="tel" pattern="[0-9]{8}" class="form-control" name="telefono"  value="{{$visitantes->telefono}} " >
                    @error('telefono')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    Correo
                    <input type="email" class="form-control" name="correo" value="{{$visitantes->correo}}">
                    @error('correo')
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