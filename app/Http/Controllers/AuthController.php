<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'rol' => $request->input('rol')
        ]);

        $this->logActivity("Usuario registrado desde Front : {$user->name}", $user);

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
