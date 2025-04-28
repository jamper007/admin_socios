<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class socios extends Model
{
    //
  use HasFactory;
    protected $table = 'socios';
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'email',
        'telefono',
        'direccion',
        'fecha_nacimiento',
        'fecha_ingreso',
        'imagen',
        'estado'
    ];
}
