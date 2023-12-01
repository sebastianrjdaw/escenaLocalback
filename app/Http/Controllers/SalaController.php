<?php

namespace App\Http\Controllers;
use App\Models\Sala;
use App\Models\Direccion;

use Illuminate\Http\Request;


class SalaController extends Controller
{
    public function __construct(){
        $this->sala = auth()->user()->sala;
    }
    
    public function setDireccion(Request $request){
        $sala = $this->sala;
        $request->validate([
            'provincia_id' => 'required',
            'localidad_id' => 'required',
            'direccion_exacta' => 'required',
        ]);

        // Buscar si la sala ya tiene una dirección
        $direccion = $sala->direccion;

        if ($direccion) {
            // Actualizar la dirección existente
            $direccion->update($request->all());
        } else {
            // Crear una nueva dirección
            $direccion = Direccion::create($request->all());
            // Asignar la dirección a la sala
            $sala->direccion()->associate($direccion);
            $sala->save();
        }

        return response()->json(['message' => 'Dirección actualizada correctamente']);
    
    }
}
