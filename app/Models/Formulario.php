<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'departamento',
        'municipio',
        'observaciones'
    ];

    public $timestamps = false;
}
