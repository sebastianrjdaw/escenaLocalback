<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tuEscenaLocal.com - Administración</title>
    <!-- Incluye los estilos de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="max-w-md w-full p-6 bg-white rounded-md shadow-md">
        <!-- Encabezado de bienvenida -->
        <h1 class="text-2xl font-bold mb-4 text-center">Bienvenido a tuEscenaLocal.com</h1>
        <p class="text-sm text-gray-600 text-center mb-6">Advertencia: Este es el inicio de sesión para Administradores.
        </p>

        <!-- Formulario de inicio de sesión -->
        <!-- Agrega esto en tu vista admin.blade.php, donde deseas mostrar el mensaje de error -->
        @if (Session::has('error'))
            <div class="text-red-500">{{ Session::get('error') }}</div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST" class="space-y-4">
          @csrf
            <!-- Correo electrónico -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Correo Electrónico:</label>
                <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Contraseña -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Contraseña:</label>
                <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Botón de inicio de sesión -->
            <div>
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">Iniciar
                    Sesión</button>
            </div>
        </form>


    </div>

</body>

</html>
