<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Auth;



class EmpleadosController extends Controller
{
    public function __construct(NotificationService $notificationService)
    {
      $this->middleware('auth'); 
      $this->notificationService = $notificationService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleados::select(
            "empleados.codigo",
            "empleados.nombre",
            "empleados.correo",
            "departamento.nombre as departamento"
        )
        ->join("departamento", "departamento.codigo", "=", "empleados.departamento") 
        ->get();
        return view('/empleados/show')->with(['empleados'=>$empleados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamento = Departamento::all();
        return view('/empleados/create')->with(['departamento' => $departamento]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre'=> 'required|regex:/^[\pL\s]+$/u',
            'correo'=> 'required',
            'departamento'=> 'required',
        ]);
        Empleados::create($data);

        $userName = Auth::user()->name;
        return $this->notificationService->notify("El empleado ha sido guardado por $userName.", 'empleados/show');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleados $empleados)
    {
        $departamento = Departamento::all();
        return view('/empleados/update')->with(['empleados' => $empleados, 'departamento'=> $departamento]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleados $empleados)
    {
        $data = request()->validate([
            'nombre'=> 'required|regex:/^[\pL\s]+$/u',
            'correo'=> 'required',
            'departamento'=> 'required',
        ]);
        
        $empleados->nombre = $data['nombre'];
        $empleados->correo = $data['correo'];
        $empleados->departamento = $data['departamento'];
        $empleados->updated_at = now();

        $empleados->save();
        $userName = Auth::user()->name;
        return $this->notificationService->notify("El empleado ha sido modificado por $userName.", 'empleados/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Empleados::destroy($id);
        return response()->json(array('res'=>true));
    }
}
