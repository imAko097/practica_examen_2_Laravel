<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class ListarMensajes extends Controller
{
    // Función que recoge los registros de la base de datos
    public function listarMensajes() {
        $registro_comentarios = Comentario::all();
        return view('/listado', ['registro_comentarios' => $registro_comentarios]);
    }
}
