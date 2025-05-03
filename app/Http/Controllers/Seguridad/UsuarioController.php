<?php

namespace App\Http\Controllers\Seguridad;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;

class UsuarioController extends Controller
{

    public function catalogo()
    {
        $usuarios = Usuario::all();

        return view("modulos.seguridad.usuario.catalogo", [
            'usuarios' => $usuarios,
        ]);
    }

    public function create()
    {
        return view("modulos.seguridad.usuario.create");
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);

        return view("modulos.seguridad.usuario.show", [
            'usuario' => $usuario,
        ]);
    }

    public function edit($id)
    {

        $usuario = Usuario::findOrFail($id);

        return view('modulos.seguridad.usuario.edit', [
            'usuario' => $usuario
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuarioAlias' => 'required|unique:seg_usuario,usuarioAlias',
            'usuarioPassword' => 'required|min:8',
            'usuarioEmail' => 'required|email|unique:seg_usuario,usuarioEmail',
        ]);

        $usuario = new Usuario();
        $usuario->usuarioAlias = $request->input('usuarioAlias');
        $usuario->usuarioPassword = md5($request->input('usuarioPassword'));
        $usuario->usuarioEmail = $request->input('usuarioEmail');
        $usuario->usuarioNombre = $request->input('usuarioNombre');
        $usuario->usuarioEstado = 'Activo';
        $usuario->save();

        return response()->json([
            'success' => true,
            'message' => 'Usuario registrado exitosamente.',
        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'usuarioAlias' => 'nullable|unique:seg_usuario,usuarioAlias,' . $id . ',idUsuario',
            'usuarioPassword' => 'nullable|min:8',
            'usuarioEmail' => 'nullable|email|unique:seg_usuario,usuarioEmail,' . $id . ',idUsuario',
            'usuarioNombre' => 'nullable|string'
        ]);

        $usuario = Usuario::findOrFail($id);

        $usuario->usuarioAlias = $request->input('usuarioAlias', $usuario->usuarioAlias);
        $usuario->usuarioEmail = $request->input('usuarioEmail', $usuario->usuarioEmail);
        $usuario->usuarioNombre = $request->input('usuarioNombre', $usuario->usuarioNombre);
        $usuario->usuarioEstado = $request->input('usuarioEstado', $usuario->usuarioEstado);

        if ($request->filled('usuarioPassword')) {
            $usuario->usuarioPassword = md5($request->input('usuarioPassword'));
        }

        $usuario->save();

        return response()->json([
            'success' => true,
            'message' => 'Usuario actualizado exitosamente.',
        ]);
    }
}
