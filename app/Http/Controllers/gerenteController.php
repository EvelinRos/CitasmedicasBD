<?php

namespace App\Http\Controllers;

use App\Models\Gerente;
use App\Models\CitaMedica;
use Illuminate\Http\Request;

class gerenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gerentes = Gerente::all();
        return view('gerente.index', compact('gerentes'));
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
        $gerente = new Gerente();
        $gerente->nombre = $request->input('nombre');
        $gerente->apellido = $request->input('apellido');
        $gerente->cedula = $request->input('cedula');
        $gerente->email = $request->input('email');
        $gerente->password = $request->input('password');
        $gerente->telefono = $request->input('telefono');
        $gerente->save();

        session()->flash('message', 'Se registró el gerente con éxito!');
        session()->flash('color', 'info');
        return redirect()->back();
    }

    public function reportes()
    {
        $citasMedicas = CitaMedica::all();
        return view('gerente.reportecitas',compact('citasMedicas'));
    }
    
    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('gerente.reporte');
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
