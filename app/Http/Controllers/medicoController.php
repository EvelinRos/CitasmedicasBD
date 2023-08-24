<?php

namespace App\Http\Controllers;

use App\Models\CitaMedica;
use App\Models\Medico;
use Illuminate\Http\Request;

class medicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicos = Medico::all();
        return view('medico.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $medico = new Medico();
        $medico->nombre = $request->input('nombre');
        $medico->apellido = $request->input('apellido');
        $medico->cedula = $request->input('cedula');
        $medico->email = $request->input('email');
        $medico->password = $request->input('password');
        $medico->telefono = $request->input('telefono');
        $medico->save();

        return redirect('disponibles');
    }

    public function horarios()
    {
        $citasMedicas = CitaMedica::all();
        return view('medico.horarios',compact('citasMedicas'));
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
