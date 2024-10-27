<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminación de comentarios</title>
</head>
<body>
    <h1>Formulario de eliminación</h1>
    <form action="{{ route('procesar.eliminar.comentarios') }}" method="POST">
        @csrf
        @method('DELETE')
        <label for="comentarios_eliminar">
            Seleccione los comentarios que quiera eliminar:
            <select name="comentarios[]" id="comentarios" multiple>
                @foreach ($registro_comentarios as $registro)
                    <option value="{{ $registro -> id }}">
                        {{ $registro -> nombre_usuario }} -
                        {{ $registro -> comentario_usuario }}
                    </option>
                @endforeach
            </select>
        </label>

        @if (session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif

        <input type="submit" value="Eliminar comentarios">

        @if (session('success'))
            <p class="exito">{{ session('success') }}</p>
        @endif

    </form>
    <a href="{{ route('listar.comentarios') }}">Volver al listado</a>
    <a href="{{ route('formulario') }}">Volver al formulario</a>
</body>
</html>