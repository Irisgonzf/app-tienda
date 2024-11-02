<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Modelo que representa un cliente
class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellidos',
        'dni',
        'direccion',
        'telefono',
        'email',
    ];
}
