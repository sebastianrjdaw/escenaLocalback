<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\Sala;
use App\Models\Artista;
use App\Models\Asistente;


class PerfilController extends Controller
{
    public function completarPerfil(Request $request)
    {
        // Obtener el usuario autenticado
        $user = auth()->user();

        // Verificar si el usuario tiene un perfil
        if (!$user->perfil) {
            // Crear un perfil para el usuario
            $perfilData = $request->only(['biografia', 'facebook', 'twitter', 'instagram', 'pagina_propia', 'spotify', 'soundcloud']);
            $perfil = new Perfil($perfilData);
            $user->perfil()->save($perfil);
        }

        switch ($user->rol) {
            case 'sala':
                Sala::firstOrCreate(['user_id' => $user->id]);
                break;
            case 'artista':
                Artista::firstOrCreate(['user_id' => $user->id]);
                break;
            case 'asistente':
                Asistente::firstOrCreate(['user_id' => $user->id]);
                break;
            // Puedes agregar más casos según sea necesario
        }
        // Retornar una respuesta JSON
        return response()->json(['message' => 'Perfil completado exitosamente', 'user' => $user]);
    }

    

    public function editarPerfil(Request $request)
    {
        // Obtener el usuario autenticado
        $user = auth()->user();

        // Verificar si el usuario tiene un perfil
        if (!$user->perfil) {
            // Puedes manejar este caso según tus necesidades, por ejemplo, retornando un mensaje de error
            return response()->json(['error' => 'El usuario no tiene un perfil asociado'], 404);
        }

        // Obtener el perfil del usuario
        $perfil = $user->perfil;

        // Añadir lógica según sea necesario

        // Retornar la respuesta JSON con los datos actuales del perfil
        return response()->json(['user' => $user, 'perfil' => $perfil]);
    }

    public function actualizarPerfil(Request $request)
    {
        // Validar la entrada del formulario
        $request->validate([
            'biografia' => 'nullable|string',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'instagram' => 'nullable|string',
            'pagina_propia' => 'nullable|string',
            'spotify' => 'nullable|string',
            'soundcloud' => 'nullable|string',
        ]);

        // Obtener el usuario autenticado
        $user = auth()->user();

        // Verificar si el usuario tiene un perfil
        if (!$user->perfil) {
            // Puedes manejar este caso según tus necesidades, por ejemplo, retornando un mensaje de error
            return response()->json(['error' => 'El usuario no tiene un perfil asociado'], 404);
        }

        // Obtener el perfil del usuario
        $perfil = $user->perfil;

        // Actualizar los datos en el perfil
        $perfil->update($request->only(['biografia', 'facebook', 'twitter', 'instagram', 'pagina_propia', 'spotify', 'soundcloud']));

        // Retornar una respuesta JSON
        return response()->json(['message' => 'Perfil actualizado exitosamente', 'user' => $user, 'perfil' => $perfil]);
    }
}



