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
        <form action="/tramites/update/{{$tramites->codigo}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    Tipo
                    <input type="text" pattern="[A-Za-z/s]+" class="form-control" name="tipo" value="{{$tramites->tipo}}">
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
                    <select name="visita" id="" class="form-control"> 
                        @foreach ($visita as $item)  
                            <option value="{{$item->codigo}}">{{$item->motivo}}</option> 
                        @endforeach   
                    </select> 
                    @error('visita') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    Estado 
                    <select name="estado" id="" class="form-control"> 
                        @foreach ($estado as $item)  
                            <option value="{{$item->codigo}}">{{$item->nombre}}</option> 
                        @endforeach   
                    </select> 
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