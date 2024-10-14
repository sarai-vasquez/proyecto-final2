@extends('layouts.app')

@section('title', 'Visitas')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp

    <h1>Visitas</h1>
    <h5>Listado de visitas</h5>
    <hr>
    {{-- Botón para ir al formulario de agregar visitas --}}
    <a class="btn btn-danger btn-sm" href="/visitas/create">Agregar nuevo visitas</a>
    <table class="table table-hover table-bordered mt-2">
        <tr>
            <td>Código</td>
            <td>FechaEntrada</td>
            <td>FechaSalida</td>
            <td>Motivo</td>
            <td>Visitante</td>
            <td>Empleado</td>
            <td>Acciones</td>
        </tr>
        {{-- Listado de visitas --}}
        @foreach ($visitas as $item)
            <tr>
                <td>{{ $item->codigo}}</td>
                <td>{{ Carbon::parse($item->fechaEntrada)->format('Y-m-d H:i:s') }}</td>
                <td>{{ Carbon::parse($item->fechaSalida)->format('Y-m-d H:i:s') }}</td>
                <td>{{ $item->motivo}}</td>
                <td>{{ $item->visitante}}</td>
                <td>{{ $item->empleado}}</td>
                <td>
                    <a class="btn btn-success btn-sm" href="/visitas/edit/{{ $item->codigo}}"> Modificar </a>
                    <button class="btn btn-danger btn-sm" url="/visitas/destroy/{{ $item->codigo}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
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