@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endpush

@push('javascript')
<script src="{{ asset('modulos/js/seguridad/usuario/image.js') }}"></script>
<script src="{{ asset('modulos/js/seguridad/usuario/create.js') }}"></script>
<script src="{{ asset('modulos/js/seguridad/usuario/edit.js') }}"></script>
@endpush

@section('slot')
<div class="d-flex flex-column flex-grow-1">
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <span class="navbar-text me-3">
                Bienvenido, {{ Auth::user()->usuarioAlias ?? 'Usuario' }}
            </span>

            <form action="{{ route('logout') }}" method="POST" class="d-inline ms-3">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">Cerrar sesión</button>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-grow-1 overflow-auto px-3 py-3">
        @yield('content')
    </div>
</div>
@endsection