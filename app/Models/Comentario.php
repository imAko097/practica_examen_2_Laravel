<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    // tabla de la BD
    protected $table = 'comments';

    // campos registro enla base de datos
    protected $fillable = [
        'nombre_usuario',
        'comentario_usuario',
        'archivo',
        'prioridad'
    ];
}
