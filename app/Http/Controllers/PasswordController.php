<?php

namespace App\Http\Controllers;

use App\Mail\forgotPasswordMail;
use App\Models\Seguridad\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('modulos.seguridad.auth.forgot-password');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:seg_usuario,usuarioEmail',
        ], [
            'email.required'    => 'El campo email es requerido.',
            'email.email'       => 'El campo email debe ser una dirección de correo electrónico válida.',
            'email.exists'      => 'El correo ingresado no se encuentra en la base de datos.',
        ]);

        $usuario = Usuario::where('usuarioEmail', $request->email)->first();

        $codigoRecuperacion = Str::random(6);

        $usuario->update([
            'usuarioCodigoRecuperacion' => $codigoRecuperacion,
        ]);

        Mail::to($request->email)->send(new forgotPasswordMail($codigoRecuperacion));

        return response()->json([
            'success' => true,
            'message' => 'Se ha enviado un código de recuperación a su correo electrónico.',
            'url'     => route('password.verify'),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('modulos.seguridad.auth.verify-reset-password-code');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $request->validate([
            'codigoRecuperacion' => 'required|exists:seg_usuario,usuarioCodigoRecuperacion',
        ], [
            'codigoRecuperacion.required' => 'El campo código de recuperación es requerido.',
            'codigoRecuperacion.exists'   => 'El código de recuperación no es válido.',
        ]);


        $codigoRecuperacion = $request->input('codigoRecuperacion');

        return response()->json([
            'success' => true,
            'message' => '',
            'url'     => route('password.reset-form', ['codigo' => $codigoRecuperacion]),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'codigoRecuperacion' => 'required|exists:seg_usuario,usuarioCodigoRecuperacion',
            'contrasena' => 'required|string|min:8'
        ], [
            'codigoRecuperacion.required' => 'El campo código de recuperación es requerido.',
            'codigoRecuperacion.exists'   => 'El código de recuperación no es válido.',
        ]);

        $codigo = $request->input('codigoRecuperacion');

        $usuario = Usuario::where('usuarioCodigoRecuperacion', $codigo)->first();

        $usuario->update([
            'usuarioCodigoRecuperacion' => null,
            'usuarioPassword' => md5($request->input('contrasena'))
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Contraseña Restablecida”',
            'url'     => route('login'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        return view('modulos.seguridad.auth.reset-password');
    }
}
