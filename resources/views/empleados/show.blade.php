@extends('layouts.app')

@section('title', 'Empleados')

@section('content')
    <div style="margin: 30px">
        <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="notificationModalLabel">Notificación</h5>
                    </div>
                    <div class="modal-body">
                        @if (session('notification'))
                            {{ session('notification')}}
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        
        <h1>Empleados</h1>
        <h5>Listado de empleados</h5>
        <hr>
        {{-- Botón para ir al formulario de agregar empleados --}}
        <a class="btn btn-danger btn-sm" href="/empleados/create">Agregar nuevos empleados</a>
        <a class="btn btn-danger btn-sm" target="_blank" href="/reporteEmp">Reporte</a>

        <table class="table table-hover table-bordered mt-2">
            <tr>
                <td>Código</td>
                <td>Nombre</td>
                <td>Correo</td>
                <td>Departamento</td>
                <td>Acciones</td>
            </tr>
            @foreach ($empleados as $item)
            
                <tr>
                    <td>{{ $item->codigo}}</td>
                    <td>{{ $item->nombre}}</td>
                    <td>{{ $item->correo}}</td>
                    <td>{{ $item->departamento}}</td>
                    <td>
                        <a class="btn btn-success btn-sm" href="/empleados/edit/{{ $item->codigo}}"> Modificar </a>
                        <button class="btn btn-danger btn-sm" url="/empleados/destroy/{{ $item->codigo }}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
                    </td>
                </tr> 
            @endforeach
        </table>
    </div>
@endsection
@section('scripts') 
 {{-- SweetAlert --}}
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 {{-- JS --}}
 <script src="{{ asset('js/proyect.js') }}"></script>
 <script>
    $(document).ready(function() {
        var notification = "{{ session('notification')}}";
        if(notification){
            $('#notificationModal').modal('show');
        }
    })
 </script>
 @endsection
 