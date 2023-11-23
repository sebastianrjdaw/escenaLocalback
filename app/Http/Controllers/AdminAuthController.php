<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        // Obtener las credenciales del formulario
        $credentials = $request->only('email', 'password');

        // Intentar autenticar al usuario
        if (auth()->attempt($credentials)) {
            // Verificar si el usuario tiene el rol de administrador
            $user = User::where('email', $request->email)->first();

            if ($user && $user->rol === 'admin') {
                // Autenticación exitosa para un administrador
                return redirect()->route('admin.index');
            } else {
                // Autenticación exitosa pero no es un administrador
                auth()->logout(); // Cerrar sesión
                return redirect()->back()->with('error', 'No tienes permisos de administrador.');
            }
        }

        // Autenticación fallida
        return redirect()->back()->with('error', 'Credenciales incorrectas.');
    }

}
