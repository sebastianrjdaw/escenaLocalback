<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Symfony\Component\HttpFoundation\Response;


class AuthController extends Controller
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email', 'rol']); // Ajusta estos campos según lo que deseas registrar en los logs
    }

    public function register(Request $request)
    {
        // Verificar si el usuario ya existe por su correo electrónico
        $existingUser = User::where('email', $request->input('email'))->first();

        if ($existingUser) {
            return response()->json(['message' => 'El usuario ya existe'], Response::HTTP_CONFLICT);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'rol' => $request->input('rol')
        ]);

        activity()
            ->causedBy(auth()->user()) // El usuario que realiza la acción
            ->performedOn($user)    // El sujeto de la acción (en este caso, el nuevo usuario)
            ->log("Usuario creado desde Api/Front: {$user->name}");

        return $user;
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response(
                ['message' => 'Credenciales Invalidas'],
                Response::HTTP_UNAUTHORIZED
            );
        }

        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;

        return response([
            'message' => 'Success',
            'jwt'=>$token
        ]);
    }


    public function user()
    {
        return Auth::user();
    }
}
