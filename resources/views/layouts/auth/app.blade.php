
@extends('layouts.app')
 
@push('styles')
    {{-- Estilos específicos para este layout --}}
    <style>
        .bg-image {
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
@endpush

@push('javascript')
    {{-- Scripts específicos para este layout --}}
    <script src="{{ asset('modulos/js/seguridad/auth/login.js') }}"></script>
    <script src="{{ asset('modulos/js/seguridad/auth/forgotPassword.js') }}"></script>
    <script src="{{ asset('modulos/js/seguridad/auth/verifyCode.js') }}"></script>
    <script src="{{ asset('modulos/js/seguridad/auth/resetPassword.js') }}"></script>

    
@endpush
 
@section('slot')
    <div class="container flex-grow-1 d-flex justify-content-center align-items-center login-wrapper">
        <div class="w-100" style="max-width: 400px;">
            <section class="p-4 shadow rounded bg-white">
                @yield('content')
            </section>
        </div>
    </div>
@endsection