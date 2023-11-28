<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $fillable = ['biografia', 'redes_sociales', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function redesSociales()
    {
        return $this->hasOne(RedesSociales::class);
    }
}
