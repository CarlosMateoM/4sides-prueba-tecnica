@extends('layouts.auth.app')

@section('title', 'Restablecer contraseña')

@section('content')
    @component('components.login.header')
        @slot('title', 'Restablece tu contraseña')
        @slot('subtitle')
            <span class="fs-5">Ingresa tu nueva contraseña</span>
        @endslot
    @endcomponent

    <div class="mt-3" id="alertContainer"></div>

    <form id="formResetPassword" method="POST" action="{{ route('password.reset') }}" class="my-5">
        @csrf
        <input type="hidden" name="codigoRecuperacion" id="codigoRecuperacion">

        <label class="input-group mb-3">
            <input placeholder="Nueva contraseña" aria-label="Nueva contraseña"
                type="password" class="form-control" name="contrasena" required minlength="8">
        </label>

        <button type="submit" class="btn btn-dark w-100 mt-3">Restablecer contraseña</button>
    </form>
@endsection

 
