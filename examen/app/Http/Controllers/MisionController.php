<?php

namespace App\Http\Controllers;

use App\Models\Mision;
use Illuminate\Http\Request;

class MisionController extends Controller
{
    
    public function index()
    {
        $misiones = Mision::all(); 
        return view('misiones.index', compact('misiones')); 
    }

    
    public function create()
    {
        return view('misiones.create'); 
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'nombre' => 'required|unique:misions|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_lanzamiento' => 'required|date',
            'tripulacion' => 'required|integer',
            'activo' => 'nullable|boolean',
        ]);

        
        $activo = $request->has('activo');
        
        Mision::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha_lanzamiento' => $request->fecha_lanzamiento,
            'tripulacion' => $request->tripulacion,
            'activo' => $activo,
        ]);

        return redirect()->route('misiones.index'); 
    }

  
    public function show($id)
    {
        $mision = Mision::find($id); 
        if (!$mision) {
            return redirect()->route('misiones.index')->with('error', 'Misión no encontrada');
        }

        return view('misiones.show', compact('mision')); 
    }


    public function edit($id)
    {
        $mision = Mision::find($id);

        if (!$mision) {
            return redirect()->route('misiones.index')->with('error', 'Misión no encontrada');
        }

        return view('misiones.edit', compact('mision')); 
    }


    public function update(Request $request, $id)
    {
        
        $mision = Mision::find($id);

        if (!$mision) {
            return redirect()->route('misiones.index')->with('error', 'Misión no encontrada');
        }


        $request->validate([
            'nombre' => 'required|string|max:255|unique:misions,nombre,' . $mision->id,
            'descripcion' => 'nullable|string',
            'fecha_lanzamiento' => 'required|date',
            'tripulacion' => 'required|integer',
            'activo' => 'nullable|boolean',
        ]);

        $activo = $request->has('activo') ? true : false;

        $mision->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha_lanzamiento' => $request->fecha_lanzamiento,
            'tripulacion' => $request->tripulacion,
            'activo' => $activo, 
        ]);

        return redirect()->route('misiones.index'); 
    }

    
    public function destroy($id)
    {
        $mision = Mision::find($id);

        if (!$mision) {
            return redirect()->route('misiones.index')->with('error', 'Misión no encontrada');
        }

       
        $mision->delete();

        return redirect()->route('misiones.index')->with('success', 'Misión eliminada'); // Redirigir a la lista de misiones
    }
}
