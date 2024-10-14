{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')
 
{{-- definimos el titulo --}}
@section('title', 'Visitas')
 
 
{{--Definimos el contenido --}}
@section('content')
<div class="container col-md-4">
    <h1>Modificar</h1>
    <h5>Formulario para modificar visitas</h5>
    <hr>
    <div class="container">
        <form action="/visitas/edit/{{$visitas->codigo }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
            <div class="col-6">
                    fechaEntrada 
                    <input type="text" class="form-control" name="fechaEntrada" value="{{$visitas->fechaEntrada }}">
                    @error('fechaEntrada') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    FechaSalida
                    <input type="text" class="form-control" name="fechaSalida" value="{{$visitas->fechaSalida }}">
                    @error('fechaSalida') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    Motivo
                    <input type="text" class="form-control" name="motivo" value="{{$visitas->motivo }}">
                    @error('motivo') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    Visitante
                    <select name="visitante" id="" class="form-control"> 
                        @foreach ($visitante as $item)  
                            <option value="{{$item->codigo}}">{{$item->nombre}}</option> 
                        @endforeach   
                    </select> 
                    @error('visitante') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    Empleado
                    <select name="empleado" id="" class="form-control"> 
                        @foreach ($empleado as $item)  
                            <option value="{{$item->codigo}}">{{$item->nombre}}</option> 
                        @endforeach   
                    </select> 
                    @error('empleado') 
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