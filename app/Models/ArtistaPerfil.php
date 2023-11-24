<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistaPerfil extends Model
{
    use HasFactory;

    public function perfil()
    {
        return $this->belongsTo(Perfil::class);
    }
}
