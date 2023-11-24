<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    public function perfilable()
    {
        return $this->morphTo();
    }
    public function redesSociales()
    {
        return $this->hasOne(RedesSociales::class);
    }
}
