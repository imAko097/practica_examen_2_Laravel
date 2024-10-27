<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
</head>
<body>
    <table>
        <tr>
            <th>Nombres</th>
            <th>Comentarios</th>
            <th>Imagen</th>
            <th>Priodidad</th>
        </tr>

        @foreach ($registro_comentarios as $registro)
            <tr>
                <td>{{ $registro -> nombre_usuario }}</td>
                <td>{{ $registro -> comentario_usuario }}</td>
                <td>
                    @if ($registro->archivo) <!-- Asegúrate de que este nombre es correcto -->
                        <img src="{{ asset('storage/' . $registro->archivo) }}" alt="No imagen" style="max-width: 100px;">
                    @else
                        <p>No hay imagen disponible</p>
                    @endif
                </td>
                <td>
                    @php
                        // Podemos incluir código PHP dentro de una vista
                        $color = ''; // asigna el color
                        $prioridad = ''; // asigna la priodad (en letra)
                        switch ($registro -> prioridad) {
                            case 1:
                                $color = 'red';
                                $prioridad = 'ALTA';
                                break;
                            case 2:
                                $color = 'orange';
                                $prioridad = 'MEDIA';
                                break;
                            case 3:
                                $color = 'green';
                                $prioridad = 'BAJA';
                                break;
                        }
                    @endphp
                    <span style="color: {{ $color }}">{{ $prioridad }}</span>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('formulario') }}">Volver al formulario</a>
    <a href="{{ route('eliminar.comentarios') }}">Eliminar comentarios</a>
</body>
</html>