@extends('admin.index')

@section('content')
    <h1>Registros de Actividad</h1>

    <table class="min-w-full bg-white border border-gray-300 mt-4">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b text-center">ID</th>
                <th class="py-2 px-4 border-b text-center">Fecha</th>
                <th class="py-2 px-4 border-b text-center">Usuario</th>
                <th class="py-2 px-4 border-b text-center">Acción</th>
                <th class="py-2 px-4 border-b text-center">Sujeto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td class="py-2 px-4 border-b text-center">{{ $log->id }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ optional($log->causer)->name }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $log->description }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ optional($log->subject)->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

