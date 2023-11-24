<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedesSociales extends Model
{
    use HasFactory;
    protected $fillable = [
        'facebook',
        'twitter',
        'instagram',
        'pagina_propia',
        'spotify',
        'soundcloud',
    ];

    public function perfil()
    {
        return $this->belongsTo(Perfil::class);
    }
}

