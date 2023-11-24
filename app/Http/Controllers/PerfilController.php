<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Perfil;
use App\Models\AsistentePerfil;
use App\Models\SalaPerfil;
use App\Models\ArtistaPerfil;

class PerfilController extends Controller
{
    public function completarPerfil()
    {
        // Obtener el usuario autenticado
        $user = auth()->user();

        // Verificar si el usuario tiene un perfil
        if (!$user->perfil) {
            // Crear un perfil para el usuario
            $perfil = new Perfil();
            $user->perfil()->save($perfil);
        }

        // Redirigir a la vista para completar el perfil general
        return view('perfil.completar', compact('user'));
    }

    public function guardarPerfil(Request $request)
    {
        // Validar la entrada del formulario
        $request->validate([
            'biografia' => 'nullable|string',
            'redes_sociales' => 'nullable|array',
            // Otros campos generales del perfil
        ]);

        // Obtener el usuario autenticado
        $user = auth()->user();

        // Guardar los datos en el perfil
        $perfil = $user->perfil;
        $perfil->update($request->except('_token'));

        // Redirigir a la vista adecuada según el rol del usuario
        if ($user->hasRole('asistente')) {
            return redirect()->route('asistente.completar');
        } elseif ($user->hasRole('sala')) {
            return redirect()->route('sala.completar');
        } elseif ($user->hasRole('artista')) {
            return redirect()->route('artista.completar');
        } else {
            // Redirigir a la vista principal o a donde sea necesario
            return redirect()->route('dashboard');
        }
    }

    
}

