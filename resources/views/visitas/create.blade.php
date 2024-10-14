@extends('layouts.app')

@section('title', 'Visitas')

@section('content') 
    <h1 class="text-center">Crear</h1>
    <h5 class="text-center">Formulario para crear visitas</h5>
    <hr>
    <div class="container">
        <form action="/visitas/store" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    fechaEntrada 
                    <input type="datetime-local" class="form-control" name="fechaEntrada">
                    @error('fechaEntrada') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    FechaSalida
                    <input type="datetime-local" class="form-control" name="fechaSalida">
                    @error('fechaSalida') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    Motivo
                    <input type="text" class="form-control" name="motivo">
                    @error('motivo') 
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="col-6">
                    Visitante
                    <select name="visitante" id="" class="form-control"> 
                        @foreach ($visitantes as $item)  
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
                        @foreach ($empleados as $item)  
                            <option value="{{$item->codigo}}">{{$item->nombre}}</option> 
                        @endforeach   
                    </select> 
                    @error('empleado') 
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