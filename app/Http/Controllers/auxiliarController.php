<?php

namespace App\Http\Controllers;

use App\Models\Auxiliar;
use Illuminate\Http\Request;

class auxiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auxiliares = Auxiliar::all();
        return view('auxiliar.index', compact('auxiliares'));
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
        $auxiliar = new Auxiliar();
        $auxiliar->nombre = $request->input('nombre');
        $auxiliar->apellido = $request->input('apellido');
        $auxiliar->cedula = $request->input('cedula');
        $auxiliar->email = $request->input('email');
        $auxiliar->password = $request->input('password');
        $auxiliar->telefono = $request->input('telefono');
        $auxiliar->save();

        session()->flash('message', 'Se registró el auxiliar con éxito!');
        session()->flash('color', 'info');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('auxiliar.funciones');
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
