<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class EliminarComentarios extends Controller
{
    // Función que muestra los comentarios a eliminar
    public function mostrarEliminar() {
        $registro_comentarios = Comentario::all();
        return view('/eliminar', ['registro_comentarios' => $registro_comentarios]);
    }

    // Función que elimina los comentarios seleccionados
    public function eliminarComentarios(Request $request) {
        $ids = $request -> input('comentarios');
        
        if ($ids) {
            Comentario::destroy($ids); // destruye los registros seleccionados
            return redirect() -> route('procesar.eliminar.comentarios') -> with('success', 'Comentarios eliminados correctamente');
        }

        return redirect() -> route('eliminar.comentarios') -> with('error', 'No se pudo eliminar los comentarios');
    }
}
