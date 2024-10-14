<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Listar todos los departamentos
        $departamento = Departamento::select(
            "departamento.codigo",
            "departamento.nombre",
            "departamento.ubicacion",
            "departamento.jefe",
            "departamento.numeroEmpleados"
        )
        ->get();
        return view('/departamento/show')->with(['departamento'=>$departamento]); 

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Departamento::all();
        return view('departamento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre'=> 'required',
            'ubicacion'=> 'required',
            'jefe'=> 'required',
            'numeroEmpleados'=> 'required',
        ]);
        Departamento::create($data);

        return redirect('departamento/show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departamento $departamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departamento $departamento)
    {
        return view('departamento/update')->with(['departamento'=> $departamento]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departamento $departamento)
    {
        $data = request()->validate([
            'nombre' => 'required',
            'ubicacion '=> 'required',
            'jefe' => 'required',
            'numeroEmpleados' => 'required'
        ]);

        $departamento->nombre = $data['nombre'];
        $departamento->ubicacion = $data['ubicacion'];
        $departamento->jefe = $data['jefe'];
        $departamento->numeroEmpleados = $data['numeroEmpleados'];
        $departamento->updated_at = now();

        $departamento->save();

        return redirect('departamento/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Departamento::destroy($id);
        return response()->json(array('res'=>true));
    }
}
