<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignablfecha_nacimientoe.
         *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'organizacion',
        'apellido',
        'nombre',
        'dni',
        'pasaporte',
        'otra_identificacion',
        'identidad',
        'otra_identidad',
        'fecha_nacimiento',
        'nivel_educativa',
        'completo_estudios',
        'calle',
        'numero',
        'torre',
        'piso',
        'departamento',
        'localidad',
        'partido',
        'provincia',
        'correo_electronico',
        'telefono',


        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
