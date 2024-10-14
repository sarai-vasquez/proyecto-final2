@extends('layouts.app')

@section('title', 'Tramites')

@section('content')
<h1>Tramites</h1>
 <h5>Listado de tramites</h5>
 <hr>
 {{-- Botón para ir al formulario de agregar tramites --}}
 <a class="btn btn-danger btn-sm" href="/tramites/create">Agregar nuevo tramite</a>
 <table class="table table-hover table-bordered mt-2">
    <tr>
        <td>Código</td>
        <td>Tipo</td>
        <td>Fecha inicio</td>
        <td>Fecha fin</td>
        <td>Descripcion</td>
        <td>Visita</td>
        <td>Estado</td>
        <td>Acciones</td>
    </tr>
    {{-- Listado de tramites --}}
    @foreach ($tramites as $item)
        <tr>
            <td>{{ $item->codigo}}</td>
            <td>{{ $item->tipo}}</td>
            <td>{{ Carbon::parse($item->fechaInicio)->format('Y-m-d H:i:s') }}</td>
            <td>{{ Carbon::parse($item->fechaFin)->format('Y-m-d H:i:s') }}</td>
            <td>{{ $item->descripcion}}</td>
            <td>{{ $item->visita}}</td>
            <td>{{ $item->estado}}</td>
            <td>
                <a class="btn btn-success btn-sm" href="/tramites/edit/{{ $item->codigo}}"> Modificar </a>
                <button class="btn btn-danger btn-sm" url="/tramites/destroy/{{ $item->codigo }}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
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