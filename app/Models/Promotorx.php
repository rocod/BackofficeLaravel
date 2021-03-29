<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotorx extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'Nombre',
        'Apellido',
        'dni',
        'organizacion',
       
    ];
}
