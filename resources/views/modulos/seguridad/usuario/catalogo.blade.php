@extends('layouts.main.app')

@section('title', 'Catálogo de Usuarios')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Catálogo de Usuarios</h2>
    <a href="{{ route('usuarios.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-person-plus"></i> Registrar nuevo usuario
    </a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Alias</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Conectado</th>
                    <th>Última Conexión</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->idUsuario }}</td>
                    <td>
                        @if ($usuario->usuarioImagen)
                        <img src="{{ $usuario->usuarioImagen }}" alt="Imagen" width="50" height="50" class="rounded-circle">
                        @else
                        <span class="text-muted">Sin imagen</span>
                        @endif
                    </td>
                    <td>{{ $usuario->usuarioAlias }}</td>
                    <td>{{ $usuario->usuarioNombre }}</td>
                    <td>{{ $usuario->usuarioEmail }}</td>
                    <td>
                        <span class="badge bg-{{ $usuario->usuarioEstado === 'Activo' ? 'success' : 'secondary' }}">
                            {{ $usuario->usuarioEstado }}
                        </span>
                    </td>
                    <td>
                        @if ($usuario->usuarioConectado)
                        <span class="badge bg-success">Sí</span>
                        @else
                        <span class="badge bg-danger">No</span>
                        @endif
                    </td>
                    <td>{{ $usuario->usuarioUltimaConexion ? $usuario->usuarioUltimaConexion->format('d/m/Y H:i') : 'Nunca' }}</td>
                    <td>
                        <a href="{{ route('usuarios.show', $usuario->idUsuario) }}" class="btn btn-sm btn-primary">
                            Ver
                        </a>
                        <a href="{{ route('usuarios.edit', $usuario->idUsuario) }}" class="btn btn-sm btn-warning d-flex align-items-center gap-1">
                            <i class="bi bi-pencil-square"></i> Editar
                        </a>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No hay usuarios registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection