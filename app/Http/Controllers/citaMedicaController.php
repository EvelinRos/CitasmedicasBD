<?php

namespace App\Http\Controllers;

use App\Models\CitaMedica;
use Illuminate\Http\Request;

class citaMedicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citasMedicas = CitaMedica::all();
        return view('cita.citaMedica', compact('citasMedicas'));
    }

    public function citas()
    {
        $citasMedicas = CitaMedica::all();
        return view('cita.listaCitas', compact('citasMedicas')); 
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
        $citaMedica = new CitaMedica();
        $citaMedica->fecha = $request->input('fecha');
        $citaMedica->hora = $request->input('hora');
        $citaMedica->motivo = $request->input('motivo');
        $citaMedica->medico = $request->input('medico');
        $citaMedica->tipoCita = $request->input('tipoCita');
        $citaMedica->estado = 'Activo';
        $citaMedica->save();
        session()->flash('message', 'Se agendó la cita medica con éxito!');
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
        $cita = CitaMedica::findOrFail($id);
        $cita->fecha = $request->input('fecha');
        $cita->hora = $request->input('hora');
        $cita->motivo = $request->input('motivo');
        $cita->medico = $request->input('medico');
        $cita->tipoCita = $request->input('tipoCita');
        $cita->estado = 'Activo';
        $cita->save();
        session()->flash('message', 'Se actualizó la cita con éxito!');
        session()->flash('color', 'info');
        return redirect('/');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cita = CitaMedica::findOrFail($id);
        $cita->estado = 'Inactivo';
        $cita->save();
        session()->flash('message', 'La cita ha sido cancelada.');
        session()->flash('color', 'danger');
        return redirect('/');
    }
}
