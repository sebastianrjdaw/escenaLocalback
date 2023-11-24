@extends('admin.index')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Editar Usuario</h1>

    <!-- Formulario para editar un usuario existente -->
    <form action="{{ route('users.update', $user->id) }}" method="post" class="max-w-md">
        @csrf
        @method('PUT')

        <label for="name" class="block mb-2">Nombre:</label>
        <input type="text" name="name" id="name" class="w-full border border-gray-300 p-2 mb-4" value="{{ $user->name }}" required>

        <label for="email" class="block mb-2">Correo Electrónico:</label>
        <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2 mb-4" value="{{ $user->email }}" required>

        <label for="password" class="block mb-2">Nueva Contraseña (opcional):</label>
        <input type="password" name="password" id="password" class="w-full border border-gray-300 p-2 mb-4">

        <button type="submit" class="bg-yellow-500 text-white py-2 px-4 hover:bg-yellow-600">Actualizar Usuario</button>
        <a href="{{ route('users.index') }}" class="block text-gray-500 mt-2 hover:underline">Volver</a>
    </form>
@endsection
