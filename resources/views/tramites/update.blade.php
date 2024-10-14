{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')
 
{{-- definimos el titulo --}}
@section('title', 'Tramites')
 
 
{{--Definimos el contenido --}}
@section('content')
<div class="container col-md-4">
    <h1>Modificar</h1>
    <h5>Formulario para modificar tramites</h5>
    <hr>
    <div class="container">
        <form action="/tramites/edit/{{$tramites->codigo}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    Tipo
                    <input type="text" class="form-control" name="tipo" value="{{$tramites->tipo}}">
                    @error('tipo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    Fecha Inicio 
                    <input type="datetime" class="form-control" name="fechaInicio" value="{{$tramites->fechaInicio}}">
                    @error('fechaInicio') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    Fecha Fin 
                    <input type="datetime" class="form-control" name="fechaFin" value="{{$tramites->fechaFin}}">
                    @error('fechaFin') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    Descripcion 
                    <input type="text" class="form-control" name="descripcion" value="{{$tramites->descripcion}}">
                    @error('descripcion') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    Visita 
                    <input type="text" class="form-control" name="visita" value="{{$tramites->visita}}">
                    @error('visita') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    Estado 
                    <input type="text" class="form-control" name="estado" value="{{$tramites->estado}}">
                    @error('estado') 
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