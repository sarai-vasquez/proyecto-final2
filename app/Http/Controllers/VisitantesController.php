<?php

namespace App\Http\Controllers;

use App\Models\Visitantes;
use Illuminate\Http\Request;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Auth;

class VisitantesController extends Controller
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
        $visitantes = Visitantes::select(
            "visitantes.codigo",
            "visitantes.nombre",
            "visitantes.identificacion",
            "visitantes.telefono",
            "visitantes.correo"
        )
        ->get();
        return view('/visitantes/show')->with(['visitantes'=>$visitantes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/visitantes/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre'=> 'required|regex:/^[\pL\s]+$/u',
            'identificacion'=> 'required',
            'telefono'=> 'required',
            'correo'=> 'required'
        ]);
        Visitantes::create($data);

        $userName = Auth::user()->name;
        return $this->notificationService->notify("El visitante ha sido guardado por $userName.", 'visitantes/show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Visitantes $visitantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visitantes $visitantes)
    {
        return view('/visitantes/update')->with(['visitantes'=> $visitantes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visitantes $visitantes)
    {
        $data = request()->validate([
            'nombre'=> 'required|regex:/^[\pL\s]+$/u',
            'identificacion'=> 'required',
            'telefono'=> 'required',
            'correo'=> 'required'
        ]);

        $visitantes->nombre = $data['nombre'];
        $visitantes->identificacion = $data['identificacion'];
        $visitantes->telefono = $data['telefono'];
        $visitantes->correo = $data['correo'];
        $visitantes->updated_at = now();

        $visitantes->save();

        $userName = Auth::user()->name;
        return $this->notificationService->notify("El visitante ha sido modificado por $userName.", 'visitantes/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Visitantes::destroy($id);
        return response()->json(array('res'=>true));
    }
}
