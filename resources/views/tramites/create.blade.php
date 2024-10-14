@extends('layouts.app')

@section('title', 'Tramites')

@section('content') 
    <h1 class="text-center">Crear</h1>
    <h5 class="text-center">Formulario para crear tramites</h5>
    <hr>
    <div class="container">
        <form action="/tramites/store" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    Tipo 
                    <input type="text" class="form-control" name="tipo">
                    @error('tipo') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    Fecha Inicio 
                    <input type="datetime-local" class="form-control" name="fechaInicio">
                    @error('fechaInicio') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    Fecha Fin 
                    <input type="datetime-local" class="form-control" name="fechaFin">
                    @error('fechaFin') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    Descripcion 
                    <input type="text" class="form-control" name="descripcion">
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
            </div>
            <div class="col-12 mt-2">
                <button class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection