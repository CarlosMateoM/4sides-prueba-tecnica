@extends('layouts.auth.app')

@section('title', 'Verificar código')

@section('content')
    @component('components.login.header')
        @slot('title', 'Recuperar contraseña')
        @slot('subtitle')
            <span class="fs-5">Verifica el código enviado a tu correo</span>
        @endslot
    @endcomponent

    @if (session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif

    <form id="formVerifyCode" method="POST" action="{{ route('password.edit') }}" class="my-5">
        @csrf
        <input type="hidden" name="email" value="{{ old('email', $email ?? '') }}">
        
        <label class="input-group mb-3">
            <input
                type="text"
                class="form-control"
                name="codigoRecuperacion"
                placeholder="Código de verificación"
                required
                autofocus
            >
        </label>

        <button type="submit" class="btn btn-dark w-100 mt-3">Verificar código</button>
    </form>
@endsection
