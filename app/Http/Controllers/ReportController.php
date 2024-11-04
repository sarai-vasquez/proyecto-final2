<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf; 
use App\Models\Departamento;
use App\Models\Empleados;
use App\Models\Estado;
use App\Models\Tramites;
use App\Models\Visitantes;
use App\Models\Visitas;


use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function reporteDep() 
    { 
        // Extraer todos los departamento
        $data = Departamento::select( 
        "departamento.codigo", 
        "departamento.nombre", 
        "departamento.ubicacion", 
        "departamento.jefe", 
        "departamento.numeroEmpleados", 
        ) 
        ->get(); 
        // Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/reportDep', compact('data')); 
        return $pdf->stream('departamento.pdf'); 
    }

    public function reporteDepFecha(Request $request) 
    { 
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
        ]);
        // Extraer solo las fechas (sin horas)
        $fechaInicio = date('Y-m-d', strtotime($request->fecha_inicio));
        $fechaFinal = date('Y-m-d', strtotime($request->fecha_final));

        // Extraer todos los departamento
        $data = Departamento::select( 
        "departamento.codigo", 
        "departamento.nombre", 
        "departamento.ubicacion", 
        "departamento.jefe", 
        "departamento.numeroEmpleados", 
        ) 
        ->whereDate('departamento.created_at', '>=', $fechaInicio) // Filtrar por fecha de inicio
        ->whereDate('departamento.created_at', '<=', $fechaFinal) // Filtrar por fecha final

        ->get(); 
        // Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/reportDep', compact('data')); 
        return $pdf->stream('departamento.pdf'); 
    }

    public function reporteEmp() 
    { 
        // Extraer todos los departamento
        $data = Empleados::select( 
        "empleados.codigo", 
        "empleados.nombre", 
        "empleados.correo", 
        "departamento.nombre as departamento", 
        ) 
        ->join("departamento", "departamento.codigo", "=", "empleados.departamento") 
        ->get(); 
        // Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/reportEmp', compact('data')); 
        return $pdf->stream('empleados.pdf'); 
    }

    public function reporteEst() 
    { 
        // Extraer todos los departamento
        $data = Estado::select( 
        "estado.codigo", 
        "estado.nombre"
        ) 
        ->get(); 
        // Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/reportEst', compact('data')); 
        return $pdf->stream('estados.pdf'); 
    }

    public function reporteTram() 
    { 
        // Extraer todos los departamento
        $data = Tramites::select( 
            "tramites.codigo", 
            "tramites.tipo", 
            "tramites.fechaInicio", 
            "tramites.fechaFin", 
            "tramites.descripcion", 
            "visitas.motivo as visita",
            "estado.nombre as estado"
        )
        ->join("visitas", "visitas.codigo", "=", "tramites.visita") 
        ->join("estado", "estado.codigo", "=", "tramites.estado") 
        ->get(); 
        // Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/reportTram', compact('data')); 
        return $pdf->stream('tramites.pdf'); 
    }

    public function reporteVitt() 
    { 
        // Extraer todos los departamento
        $data = Visitantes::select( 
            "visitantes.codigo",
            "visitantes.nombre",
            "visitantes.identificacion",
            "visitantes.telefono",
            "visitantes.correo"
        )
        ->get(); 
        // Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/reportVitt', compact('data')); 
        return $pdf->stream('visitantes.pdf'); 
    }

    public function reporteVis() 
    { 
        // Extraer todos los departamento
        $data = Visitas::select( 
            "visitas.codigo",
            "visitas.fechaEntrada",
            "visitas.fechaSalida",
            "visitas.motivo",
            "visitantes.nombre as visitante",
            "empleados.nombre as empleado"
        )
        ->join("visitantes", "visitantes.codigo", "=", "visitas.visitante") 
        ->join("empleados", "empleados.codigo", "=", "visitas.empleado") 
        ->get(); 
        // Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/reportVis', compact('data')); 
        return $pdf->stream('visitas.pdf'); 
    }
}
