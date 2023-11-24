@extends('admin.index')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-semibold">Lista de Usuarios</h1>
    <a href="{{ route('users.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Crear Nuevo</a>
</div>

    <!-- Mostrar la lista de usuarios -->
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b text-center">ID</th>
                <th class="py-2 px-4 border-b text-center">Nombre</th>
                <th class="py-2 px-4 border-b text-center">Correo Electrónico</th>
                <th class="py-2 px-4 border-b text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="py-2 px-4 border-b text-center">{{ $user->id }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $user->name }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $user->email }}</td>
                    <td class="py-2 px-4 border-b text-center">
                        <a href="{{ route('users.show', $user->id) }}" class="text-blue-500 hover:underline mr-2">Ver</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-500 hover:underline mr-2">Editar</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

