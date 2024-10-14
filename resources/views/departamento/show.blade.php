@extends('layouts.app')

@section('title', 'Departamentos')

@section('content')
<h1>Departamentos</h1>
 <h5>Listado de departamentos</h5>
 <hr>
 {{-- Botón para ir al formulario de agregar departamento --}}
 <a class="btn btn-danger btn-sm" href="/departamento/create">Agregar nuevo departamento</a>
 <table class="table table-hover table-bordered mt-2">
    <tr>
        <td>Código</td>
        <td>Nombre</td>
        <td>Ubicacion</td>
        <td>Jefe</td>
        <td>Numero de empleados</td>
        <td>Acciones</td>
    </tr>
 {{-- Listado de estado --}}
    @foreach ($departamento as $item)
     
        <tr>
            <td>{{ $item->codigo}}</td>
            <td>{{ $item->nombre}}</td>
            <td>{{ $item->ubicacion}}</td>
            <td>{{ $item->jefe}}</td>
            <td>{{ $item->numeroEmpleados}}</td>
            
            <td>
                <a class="btn btn-success btn-sm" href="/departamento/edit/{{ $item->codigo}}"> Modificar </a>
                <button class="btn btn-danger btn-sm" url="/departamento/destroy/{{ $item->codigo}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
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