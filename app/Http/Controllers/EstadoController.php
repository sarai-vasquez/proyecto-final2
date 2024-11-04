<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Auth;


class EstadoController extends Controller
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
            'nombre'=> 'required|regex:/^[\pL\s]+$/u',
        ]);
        Estado::create($data);

        $userName = Auth::user()->name;
        return $this->notificationService->notify("El estado ha sido guardado por $userName.", 'estado/show');

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
            'nombre' => 'required|regex:/^[\pL\s]+$/u',
        ]);

        $estado->nombre = $data['nombre'];
        $estado->updated_at = now();

        $estado->save();

        $userName = Auth::user()->name;
        return $this->notificationService->notify("El estado ha sido modificado por $userName.", 'estado/show');
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
