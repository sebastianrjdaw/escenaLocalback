<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends User
{
    use HasFactory;
    protected $fillable = ['user_id', 'direccion', 'capacidad'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function direccion(){
        return $this->belongsTo(Direccion::class);
    }
}
