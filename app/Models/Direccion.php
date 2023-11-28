<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model {
    protected $fillable = ['provincia_id', 'localidad_id', 'direccion_exacta'];

    public function provincia() {
        return $this->belongsTo(Provincia::class);
    }

    public function localidad() {
        return $this->belongsTo(Localidad::class);
    }
}
