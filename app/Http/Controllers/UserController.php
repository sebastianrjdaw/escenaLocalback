<?php
namespace App\Http\Controllers;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\LogActivity;

class UserController extends Controller
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email', 'rol']); // Ajusta estos campos según lo que deseas registrar en los logs
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validar la entrada del formulario
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'rol' => 'required'
        ]);

        // Crear un nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'rol' => $request->rol
        ]);

        // Registrar la actividad
        activity()
            ->causedBy(auth()->user()) // El usuario que realiza la acción
            ->performedOn($user)    // El sujeto de la acción (en este caso, el nuevo usuario)
            ->log("Usuario creado desde Servidor: {$user->name}");

        return redirect()->route('users.index')
            ->with('success', 'Usuario creado exitosamente.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validar la entrada del formulario
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        // Actualizar el usuario
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        // Registrar la actividad
        activity()
            ->causedBy(auth()->user())
            ->performedOn($user)
            ->log("Usuario actualizado desde Servidor: {$user->name}");

        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        // Eliminar el usuario
        $user->delete();

        // Registrar la actividad
        activity()
            ->causedBy(auth()->user())
            ->performedOn($user)
            ->log("Usuario eliminado desde Servidor: {$user->name}");

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado exitosamente.');
    }
}
