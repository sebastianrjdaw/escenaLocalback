<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Direccion;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    protected function getSala()
    {
        return auth()->user()->sala;
    }

    public function __construct()
    {
        $this->sala = $this->getSala();
    }

    public function getDireccion()
    {
        $sala = $this->sala;

        if ($sala && $sala->direccion) {
            return $sala->direccion;
        }

        return response()->json(['message' => 'No se encuentra la dirección']);
    }

    public function setDireccion(Request $request)
    {
        $sala = $this->sala;

        $request->validate([
            'provincia_id' => 'required',
            'localidad_id' => 'required',
            'direccion_exacta' => 'required',
        ]);

        // Buscar o crear una nueva dirección
        $direccion = Direccion::firstOrCreate($request->only(['provincia_id', 'localidad_id', 'direccion_exacta']));

        // Asignar la dirección a la sala
        $sala->direccion()->associate($direccion);
        $sala->save();

        return response()->json(['message' => 'Dirección actualizada correctamente']);
    }
}

