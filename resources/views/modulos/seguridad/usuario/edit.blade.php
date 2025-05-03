@extends('layouts.main.app')

@section('title', 'Detalle del Usuario')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar usuario</h1>

    <div id="alertContainer" class="mt-3"></div>


    <form id="formUpdateUser" action="{{ route('usuarios.update', $usuario->idUsuario) }}" method="PUT">
        @csrf
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="usuarioAlias" class="form-label">Alias</label>
            <input type="text" class="form-control @error('usuarioAlias') is-invalid @enderror" id="usuarioAlias" name="usuarioAlias" value="{{ $usuario->usuarioAlias }}">

        </div>


        <div class="mb-3">
            <label for="usuarioNombre" class="form-label">Nombre </label>
            <input type="text" class="form-control @error('usuariosNombre') is-invalid @enderror" id="usuarioEmail" name="usuarioNombre" value="{{  $usuario->usuarioNombre }}">

        </div>



        <div class="mb-3">
            <label for="usuarioEmail" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control @error('usuarioEmail') is-invalid @enderror" id="usuarioEmail" name="usuarioEmail" value="{{  $usuario->usuarioEmail }}">

        </div>

        <div class="mb-3">
            <label for="usuarioEstado" class="form-label">Estado</label>
            <select class="form-select @error('usuarioEstado') is-invalid @enderror" id="usuarioEstado" name="usuarioEstado">
                <option value="Activo" {{ $usuario->usuarioEstado == 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Inactivo" {{ $usuario->usuarioEstado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="usuarioPassword" class="form-label">Contraseña(opcional)</label>
            <input type="password" class="form-control @error('usuarioPassword') is-invalid @enderror" id="usuarioPassword" name="usuarioPassword">

        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('usuarios.catalogo') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Volver al catálogo
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Actualizar
            </button>
        </div>

    </form>
    </section>
</div>
</div>
@endsection