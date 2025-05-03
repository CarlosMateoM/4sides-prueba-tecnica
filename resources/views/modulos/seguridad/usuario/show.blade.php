@extends('layouts.main.app')

@section('title', 'Detalle del Usuario')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Detalle del Usuario</h2>

    <div class="card">
        <div class="card-body">


            @if ($usuario->usuarioImagen)
            <div class="mb-3 text-center">
                <img src="{{ $usuario->usuarioImagen }}" alt="Imagen" width="100" height="100" class="rounded-circle">
            </div>
            @else
            <p class="text-center text-muted">Sin imagen</p>
            @endif 

            <div class="text-center mb-3">
                <a href="{{ route('usuarios.edit-image', $usuario->idUsuario) }}" class="btn btn-sm btn-outline-primary">
                    Cambiar Imagen
                </a>
            </div>

            <ul class="list-group">
                <li class="list-group-item"><strong>ID:</strong> {{ $usuario->idUsuario }}</li>
                <li class="list-group-item"><strong>Alias:</strong> {{ $usuario->usuarioAlias }}</li>
                <li class="list-group-item"><strong>Nombre:</strong> {{ $usuario->usuarioNombre }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $usuario->usuarioEmail }}</li>
                <li class="list-group-item"><strong>Estado:</strong>
                    <span class="badge bg-{{ $usuario->usuarioEstado === 'Activo' ? 'success' : 'secondary' }}">
                        {{ $usuario->usuarioEstado }}
                    </span>
                </li>
                <li class="list-group-item"><strong>Conectado:</strong> {{ $usuario->usuarioConectado ? 'Sí' : 'No' }}</li>
                <li class="list-group-item"><strong>Última Conexión:</strong> {{ $usuario->usuarioUltimaConexion ? $usuario->usuarioUltimaConexion->format('d/m/Y H:i') : 'Nunca' }}</li>
                <li class="list-group-item">
                    <a href="{{ route('usuarios.catalogo') }}" class="btn btn-secondary btn-sm">Volver</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection