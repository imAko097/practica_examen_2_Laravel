<?php

use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrarComentario;
use App\Http\Controllers\ListarMensajes;
use App\Http\Controllers\EliminarComentarios;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view ('formulario');
}) -> name('formulario');

// Ruta registrar formulario
Route::post('/registrar-comentario', [RegistrarComentario::class, 'registrarComentario']) -> name('registrar.comentario');

// Ruta para listar los mensajes
Route::get('/listar-comentarios', [ListarMensajes::class, 'listarMensajes']) -> name('listar.comentarios');

// Ruta para mostrar los comentarios a borrar
Route::get('/eliminar-comentarios', [EliminarComentarios::class, 'mostrarEliminar']) -> name('eliminar.comentarios');

// Ruta para eliminar comentarios
Route::delete('/eliminar-comentarios', [EliminarComentarios::class, 'eliminarComentarios']) -> name('procesar.eliminar.comentarios');