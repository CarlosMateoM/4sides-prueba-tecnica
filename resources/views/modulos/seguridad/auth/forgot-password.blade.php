@extends('layouts.auth.app')

@section('title', 'Recuperar contraseña')

@section('content')
@component('components.login.header')
@slot('title', '¿Olvidaste tu contraseña?')
@slot('subtitle')
<span class="fs-6">Ingresa tu correo electrónico para recibir el enlace de recuperación.</span>
@endslot
@endcomponent

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<div id="alertContainer"></div>

<form id="formForgotPassword" method="POST" action="{{ route('password.update') }}" class="my-4">
    @csrf
    <label class="input-group mb-3">
        <input type="email" name="email" class="form-control" required placeholder="Correo electrónico">
    </label>

    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('login') }}" class="btn btn-outline-secondary">Cancelar</a>
        <button type="submit" class="btn btn-dark">Continuar</button>
    </div>

</form>


@endsection