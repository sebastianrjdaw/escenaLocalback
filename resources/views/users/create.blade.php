@extends('admin.index')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Crear Usuario</h1>

    <!-- Formulario para crear un nuevo usuario -->
    <form action="{{ route('users.store') }}" method="post" class="max-w-md">
        @csrf
        <label for="name" class="block mb-2">Nombre:</label>
        <input type="text" name="name" id="name" class="w-full border border-gray-300 p-2 mb-4" required>

        <label for="email" class="block mb-2">Correo Electrónico:</label>
        <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2 mb-4" required>

        <label for="password" class="block mb-2">Contraseña:</label>
        <input type="password" name="password" id="password" class="w-full border border-gray-300 p-2 mb-4" required>

        <!-- Nuevo campo de selección para el rol -->
        <label for="rol" class="block mb-2">Rol:</label>
        <select name="rol" id="rol" class="w-full border border-gray-300 p-2 mb-4" required>
            <option value="admin">Administrador</option>
            <option value="sala">Sala</option>
            <option value="artista">Artista</option>
            <option value="asistente">Asistente</option>
        </select>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 hover:bg-blue-600">Guardar Usuario</button>
        <a href="{{ route('users.index') }}" class="block text-gray-500 mt-2 hover:underline">Volver</a>

    </form>

@endsection
