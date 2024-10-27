<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class RegistrarComentario extends Controller
{
    // Función para validar y registrar un comentario en la base de datos
    public function registrarComentario(Request $request) {
        $palabras_prohibidas = ['spam', 'prohibido', 'virus'];

        $datos_formulario = $request -> validate([
            'nombre_usuario' => 'required|string|max:50',
            'comentario_usuario' => 'required|string|max:500',
            'archivo' => 'nullable|image|max:2048', // valida la imagen (opcional, tipo imagen, max 2MB)
            'prioridad' => 'in:1,2,3'
        ], [
            'nombre_usuario.required' => 'Campo nombre obligatorio',
            'nombre_usuario.max' => 'El campo nombre debe tener menos de 50 caracteres',
            'comentario_usuario.required' => 'El comentario es obligatorio',
            'archivo.image' => 'El archivo debe ser una imagen',
            'archivo.max' => 'La imagen no debe pesar más de 2MB',
            'prioridad.in' => 'Debe seleccionar una opción válida'
        ]);

        // Verifica si hay una imagen y la almacena
        if ($request->hasFile('archivo')) {
            $path = $request->file('archivo')->store('imagenes', 'public');
            $datos_formulario['archivo'] = $path; // Asigna la ruta de la imagen a los datos del formulario
        } else {
            $datos_formulario['archivo'] = null;
        }

        // Valida si el comentario contiene alguna palabra prohibida; si es así, no registra
        foreach($palabras_prohibidas as $palabra_prohibida) {
            if (stripos($request -> comentario_usuario, $palabra_prohibida)) {
                return back() -> withErrors([
                    'comentario_usuario' => 'El comentario contiene una palabra prohibida'
                ]) -> withInput();
            }
        }

        // Crear objeto del modelo Mensaje para registrarlo en la base de datos
        $datos_a_registrar = new Comentario($datos_formulario);

        $datos_a_registrar -> save(); // guardar en la base de datos

        // Devuelve la vista del formulario con el mensaje
        return redirect() -> route('formulario') -> with('success', 'Comentario registrado correctamente');
    }
}
