<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Visitas;
use App\Models\Visitantes;
use App\Models\Empleados;
use Illuminate\Http\Request;

class VisitasController extends Controller
{
    public function __construct() 
    { 
        $this->middleware('auth'); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visitas = Visitas::select(
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
        
        return view('visitas/show')->with(['visitas' => $visitas]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $visitantes = Visitantes::all();
        $empleados = Empleados::all();
        return view('/visitas/create')->with([
            'visitantes' => $visitantes, 
            'empleados' => $empleados
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'fechaEntrada'=> 'required',
            'fechaSalida'=> 'required',
            'motivo'=> 'required',
            'visitante'=> 'required',
            'empleado'=> 'required',
        ]);
        Visitas::create($data);
        return redirect('visitas/show');

    }

    /**
     * Display the specified resource.
     */
    public function show(Visitas $visitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visitas $visitas)
    {
        $visitante = Visitantes::all();
        $empleado = empleados::all();
        return view('/visitas/update')->with(['visitas' => $visitas, 'visitante' => $visitante, 'empleado' => $empleado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visitas $visitas)
    {
        $data = request()->validate([
            'fechaEntrada'=> 'required',
            'fechaSalida'=> 'required',
            'motivo'=> 'required',
            'visitante'=> 'required',
            'empleado'=> 'required',
        ]);

        $visitas->fechaEntrada = $data['fechaEntrada'];
        $visitas->fechaSalida = $data['fechaSalida'];
        $visitas->motivo = $data['motivo'];
        $visitas->visitante = $data['visitante'];
        $visitas->empleado = $data['empleado'];
        $visitas->updated_at = now();

        $visitas->save();
        return redirect('visitas/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Visitas::destroy($id);
        return response()->json(array('res'=>true));
    }
}
