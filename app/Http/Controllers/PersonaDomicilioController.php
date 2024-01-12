<?php

namespace App\Http\Controllers;

use App\Http\Requests\DomicilioRequest;
use App\Http\Requests\PersonaRequest;
use App\Models\Persona;
use App\Models\PersonaDomicilio;
use Illuminate\Http\Request;

class PersonaDomicilioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Persona $persona)
    {
        return view('personas.domicilios.index', compact('persona'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Persona $persona)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DomicilioRequest $request, Persona $persona)
    {
        $domicilio = new PersonaDomicilio();

        $domicilio->domicilio = $request->domicilio;
        $domicilio->codigo_postal = $request->codigo_postal;
        $domicilio->telefono = $request->telefono;
        $domicilio->email = $request->email;
        $domicilio->tipo = $request->tipo;
        $domicilio->persona_id = $persona->id;

        

        $domicilio->save();

        return redirect()->route('personas.domicilios.index', compact('persona'));
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
    public function update(DomicilioRequest $request, Persona $persona, PersonaDomicilio $domicilio)
    {
        
        
        $domicilio->domicilio = $request->domicilio;
        $domicilio->codigo_postal = $request->codigo_postal;
        $domicilio->telefono = $request->telefono;
        $domicilio->email = $request->email;
        $domicilio->tipo = $request->tipo;
        $domicilio->persona_id = $persona->id;

        $domicilio->save();

        return redirect()->route('personas.domicilios.index', compact('persona'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona, PersonaDomicilio $domicilio)
    {
        $domicilio->delete();
        return redirect()->route('personas.domicilios.index', compact('persona'));
    }
}
