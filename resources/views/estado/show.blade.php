@extends('layouts.app')

@section('title', 'Estado')

@section('content')
    <h1>Estado</h1>
    <h5>Listado de estados</h5>
    <hr>
 {{-- Botón para ir al formulario de agregar estado --}}
 <a class="btn btn-danger btn-sm" href="/estado/create">Agregar estado</a>
 <table class="table table-hover table-bordered mt-2">
    <tr>
        <td>Código</td>
        <td>Nombre</td>
        <td>Acciones</td>
    </tr>
 {{-- Listado de estado --}}
 @foreach ($estado as $item)
     
    <tr>
        <td>{{ $item->codigo}}</td>
        <td>{{ $item->nombre}}</td>
        <td>
            <a class="btn btn-success btn-sm" href="/estado/edit/{{ $item->codigo}}"> Modificar </a>
            <button class="btn btn-danger btn-sm" url="/estado/destroy/{{ $item->codigo }}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
        </td>
    </tr> 
 @endforeach
 </table>
@endsection
@section('scripts') 
    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- JS --}}
    <script src="{{ asset('js/proyect.js') }}"></script>
@endsection