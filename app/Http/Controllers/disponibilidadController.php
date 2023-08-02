<?php

namespace App\Http\Controllers;

use App\Models\Disponibilidad;
use Illuminate\Http\Request;

class disponibilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disponibles = Disponibilidad::all();
        return view('cita.disponibilidad', compact('disponibles'));
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
        $disponibilidad = new Disponibilidad();
        $disponibilidad->fecha = $request->input('fecha');
        $disponibilidad->hora = $request->input('hora');
        $disponibilidad->save();
        session()->flash('message', 'Se agregó la disponibilidad!');
        session()->flash('color', 'info');
        return redirect('/');
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
