<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $fillable = ['biografia', 'facebook', 'twitter', 'instagram', 'pagina_propia', 'spotify', 'soundcloud'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
