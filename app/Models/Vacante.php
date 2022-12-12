<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $dates=['fecha_postulacion'];

    protected $fillable = [
        'titulo',
        'empresa',
        'salario_id',
        'categoria_id',
        'fecha_postulacion',
        'img',
        'descripcion',
        'user_id'
    ];
}
