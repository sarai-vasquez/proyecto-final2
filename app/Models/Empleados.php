<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;
    protected $table = 'empleados'; // Nombre de la tabla 
    protected $primaryKey = 'codigo'; // Llave primaria de la tabla 
    protected $fillable = ['nombre', 'correo','departamento']; // Campos para asignación másiva
}
