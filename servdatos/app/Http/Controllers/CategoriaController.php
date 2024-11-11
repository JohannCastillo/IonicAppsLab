<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;



class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ListaCategoria=Categoria::where('estado','=','1')->get(); 
        return response()->json($ListaCategoria);
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
        $nuevaCategoria = Categoria::create([
            'descripcion' => $request->descripcion,
            'estado' => 1,
        ]);

        return response()->json($nuevaCategoria, 201);
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return response()->json($categoria);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return 204;
    }

    public function delete($id) 
    { 
        $categoria= Categoria::findOrFail($id); 
        $categoria->delete(); 
        return 204; 
    } 
}
