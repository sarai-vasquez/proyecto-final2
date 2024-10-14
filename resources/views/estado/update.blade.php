{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')
 
{{-- definimos el titulo --}}
@section('title', 'Estados')
 
 
{{--Definimos el contenido --}}
@section('content')
<div class="container col-md-4">
    <h1>Modificar</h1>
    <h5>Formulario para modificar estados</h5>
    <hr>
    <div class="container">
        <form action="/estado/update/{{$estado->codigo}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <dic class="col-6">
                    Nombre
                    <input type="text" class="form-control" name="nombre" value="{{$estado->nombre}}">
                    @error('nombre')
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