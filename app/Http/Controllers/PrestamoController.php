<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('prestamos.index', [
            'prestamos' => Prestamo::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prestamos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ejemplar_id' => 'required|numeric|exists:ejemplars,id',
            'cliente_id' => 'required|numeric|exists:clientes,id',
        ]);
        $prestamo = Prestamo::create($validated);
        session()->flash('exito', 'Prestamo creado correctamente.');
        return redirect()->route('prestamos.index', $prestamo);
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestamo $prestamo)
    {
        return view('prestamos.show',[
            'prestamo' => $prestamo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamo $prestamo)
    {
        $prestamo->delete();
        return redirect()->route('prestamos.index');
    }
}
