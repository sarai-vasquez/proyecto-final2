<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estado = Estado::select(
            "estado.codigo",
            "estado.nombre"
        )
        ->get();
        return view('/estado/show')->with(['estado' => $estado]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Estado::all();
        return view('estado/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre'=> 'required',
        ]);
        Estado::create($data);

        return redirect('estado/show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estado $estado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estado $estado)
    {
        return view('estado/update')->with(['estado'=> $estado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estado $estado)
    {
        $data = request()->validate([
            'nombre' => 'required',
        ]);

        $estado->nombre = $data['nombre'];
        $estado->updated_at = now();

        $estado->save();

        return redirect('estado/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Estado::destroy($id);
        return response()->json(array(['res'=>true]));
    }
}
