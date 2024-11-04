@extends('layouts.app')

@section('title', 'Visitas')

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
        
        @php
            use Carbon\Carbon;
        @endphp

        <h1>Visitas</h1>
        <h5>Listado de visitas</h5>
        <hr>
        {{-- Botón para ir al formulario de agregar visitas --}}
        <a class="btn btn-danger btn-sm" href="/visitas/create">Agregar nuevo visitas</a>
        <a class="btn btn-danger btn-sm" target="_blank" href="/reporteVis">Reporte</a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Reporte por fecha
        </button>

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
    <script>
        document.getElementById('reporteForm').addEvenlistener('submit', function(event){
            const fechaInicio = new Date(document.getElementById('fecha-inicio').value);
            const fechaFinal = new Date(document.getElementById('fecha-final').value);
    
            if (fechaFinal < fechaInicio) {
                event.preventDefault(); // Evitar el envío del formulario
                alert('La fecha final no puede ser menor que la fecha de inicio.'); // Mensaje de alerta
            }
        })
    </script>
 @endsection
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/reporteVisFecha" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="fecha-inicio" class="col-form-label">Fecha Inicio:</label>
                    <input type="date" class="form-control" name="fecha_inicio" id="fecha-inicio" required>
                </div>
                <div class="mb-3">
                    <label for="fecha-final" class="col-form-label">Fecha Final:</label>
                    <input type="date" class="form-control" name="fecha_final" id="fecha-final" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Crear reporte</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>