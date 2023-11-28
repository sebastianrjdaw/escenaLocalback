<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'provincia_id'];

    public function provincia(){

        return $this->belongsTo(Provincia::class);
    }
}
