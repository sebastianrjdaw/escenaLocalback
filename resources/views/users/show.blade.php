@extends('admin.index')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Detalles del Usuario</h1>

    <!-- Mostrar detalles del usuario -->
    <div class="mb-4">
        <strong>Nombre:</strong> {{ $user->name }}
    </div>
    <div class="mb-4">
        <strong>Correo Electrónico:</strong> {{ $user->email }}
    </div>
    <div class="mb-4">
        <strong>Rol:</strong> {{ $user->rol }}
    </div>
    <div class="mb-4">
        <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-500 hover:underline">Editar Usuario</a>
    </div>
    <a href="{{ route('users.index') }}" class="block text-gray-500 mt-2 hover:underline">Volver</a>

@endsection
