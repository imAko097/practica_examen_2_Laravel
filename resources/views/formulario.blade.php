<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Formulario</title>
</head>
<body>
    <h1>Formulario</h1>
    <form action="{{ route('registrar.comentario') }}" method="POST"  enctype="multipart/form-data">
        @csrf

        <label for="nombre">Nombre: <span>*</span>
            <input type="text" name="nombre_usuario">
        </label>
        @if ($errors -> has('nombre_usuario'))
            <p class="error">{{ $errors -> first('nombre_usuario') }}</p>
        @endif
        <br>
        <label for="comentario">Comentario: <span>*</span>
            <textarea type="text" name="comentario_usuario"></textarea>
        </label>
        @if ($errors -> has('comentario_usuario'))
            <p class="error">{{ $errors -> first('comentario_usuario') }}</p>
        @endif
        <br>
        <label for="archivo">Sube una imagen:
            <input type="file" name="archivo" id="archivo" accept="image/*">
        </label>
        @if ($errors -> has('archivo'))
            <p class="error">{{ $errors -> first('archivo') }}</p>
        @endif
        <br>
        <select name="prioridad" id="prioridad">
            <option value="1">ALTA</option>
            <option value="2">MEDIA</option>
            <option value="3">BAJA</option>
        </select>
        @if ($errors -> has('prioridad'))
            <p class="error">{{ $errors -> first('prioridad') }}</p>
        @endif
        <br>
        <input type="submit" value="Enviar comentario">

        @if (session('success'))
            <p class="exito">{{ session('success') }}</p>
        @endif

    </form>
    <a href="{{ route('listar.comentarios') }}">Ver listado de mensajes</a>
</body>
</html>