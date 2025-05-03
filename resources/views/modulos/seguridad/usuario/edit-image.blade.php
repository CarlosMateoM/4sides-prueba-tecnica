@extends('layouts.main.app')

@section('title', 'Actualizar Imagen de Usuario')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Actualizar Imagen de Usuario</h3>

    <form id="formImageUpdate" class="form-ajax" method="POST" action="{{ route('usuarios.updateImage', $usuario->idUsuario) }}" enctype="multipart/form-data">
        @csrf
        <div class="alert-container mb-2"></div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen de Perfil</label><br>
            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
        </div>

        <div class="mb-3">
           
            <div id="preview-container">
                @if ($usuario->usuarioImagen)
                <img id="preview-image" src="{{ $usuario->usuarioImagen  }}" class="img-thumbnail" style="max-height: 200px;">
                @else
                <p id="no-image-text">No tienes una imagen de perfil</p>
                @endif
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('usuarios.show', $usuario->idUsuario) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection