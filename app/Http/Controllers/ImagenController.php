<?php

namespace App\Http\Controllers;

use App\Models\Seguridad\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $usuario = Usuario::findOrFail($id);

        return view('modulos.seguridad.usuario.edit-image', compact('usuario'));
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
        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $usuario = Usuario::findOrFail($request->id);
        
        $imagen = $request->file('imagen');

        $path = Storage::disk('public')->put('/', $imagen);

        $url = asset('storage/' . $path);

        $usuario->update(['usuarioImagen' => $url]);

        return response()->json([
            'success' => true,
            'message' => 'Imagen actualizada exitosamente.',
 
        ]);
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
