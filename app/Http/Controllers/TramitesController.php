<?php

namespace App\Http\Controllers;

use App\Models\Tramites;
use App\Models\Visitas;
use App\Models\Estado;
use Illuminate\Http\Request;

class TramitesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tramites = Tramites::select(
            "tramites.codigo",
            "tramites.tipo",
            "tramites.fechaInicio",
            "tramites.fechaFin",
            "tramites.descripcion",
            "visitas.motivo as visita",
            "estado.nombre as estado"
        )
        ->join("visitas", "visitas.motivo", "=", "tramites.visita") 
        ->join("estado", "estado.codigo", "=", "tramites.estado") 
        ->get();
        return view('/tramites/show')->with(['tramites' => $tramites]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $visita = Visitas::all();
        $estado = Estado::all();
        return view('/tramites/create')->with(['visita' => $visita, 'estado' => $estado]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'tipo'=> 'required',
            'fechaInicio'=> 'required',
            'fechaFin'=> 'required',
            'descripcion'=> 'required',
            'visita'=> 'required',
            'estado'=> 'required',
        ]);
        Tramites::create($data);
        return redirect('tramites/show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tramites $tramites)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tramites $tramites)
    {
        $visita = Visitas::all();
        $estado = Estado::all();
        return view('/tramites/update')->with(['tramites' => $tramites, 'visita' => $visita, 'estado' => $estado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tramites $tramites)
    {
        $data = request()->validate([
            'tipo'=> 'required',
            'fechaInicio'=> 'required',
            'fechaFin'=> 'required',
            'descripcion'=> 'required',
            'visita'=> 'required',
            'estado'=> 'required',
        ]);

        $tramites->tipo = $data['tipo'];
        $tramites->fechaInicio = $data['fechaInicio'];
        $tramites->fechaFin = $data['fechaFin'];
        $tramites->descripcion = $data['descripcion'];
        $tramites->visita = $data['visita'];
        $tramites->estado = $data['estado'];
        $tramites->update_at = now();

        $tramites->save();
        return redirect('/tramites/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Tramites::destroy($id);
        return response()->json(array('res'=>true));
    }
}
