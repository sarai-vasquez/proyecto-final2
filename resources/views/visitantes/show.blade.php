@extends('layouts.app')

@section('title', 'Visitantes')

@section('content')
<h1>Visitantes</h1>
 <h5>Listado de visitantes</h5>
 <hr>
 {{-- Botón para ir al formulario de agregar visitantes --}}
 <a class="btn btn-danger btn-sm" href="/visitantes/create">Agregar nuevo visitante</a>
 <table class="table table-hover table-bordered mt-2">
    <tr>
        <td>Código</td>
        <td>Nombre</td>
        <td>Identificacion</td>
        <td>Telefono</td>
        <td>Correo</td>
        <td>Acciones</td>
    </tr>
    {{-- Listado de visitas --}}
 @foreach ($visitantes as $item)
    <tr>
        <td>{{ $item->codigo}}</td>
        <td>{{ $item->nombre}}</td>
        <td>{{ $item->identificacion}}</td>
        <td>{{ $item->telefono}}</td>
        <td>{{ $item->correo}}</td>
        <td>
            <a class="btn btn-success btn-sm" href="/visitantes/edit/{{ $item->codigo}}"> Modificar </a>
            <button class="btn btn-danger btn-sm" url="/visitantes/destroy/{{ $item->codigo}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
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