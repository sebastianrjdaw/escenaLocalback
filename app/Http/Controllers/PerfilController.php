<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\RedesSociales;

class PerfilController extends Controller
{
    public function completarPerfil(Request $request)
    {
        // Obtener el usuario autenticado
        $user = auth()->user();

        // Verificar si el usuario tiene un perfil
        if (!$user->perfil) {
            // Crear un perfil para el usuario
            $perfil = new Perfil();
            $user->perfil()->save($perfil);
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
            'redes_sociales' => 'nullable|array',
            // Otros campos generales del perfil
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
        $perfil->update($request->except('_token'));

        // Actualizar o crear redes sociales asociadas al perfil
        foreach ($request->input('redes_sociales') as $redSocial) {
            RedesSociales::updateOrCreate(
                ['perfil_id' => $perfil->id, 'plataforma' => $redSocial['plataforma']],
                ['username' => $redSocial['username']]
            );
        }

        // Retornar una respuesta JSON
        return response()->json(['message' => 'Perfil actualizado exitosamente', 'user' => $user, 'perfil' => $perfil]);
    }
}
