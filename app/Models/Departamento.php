<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $table = 'departamento'; // Nombre de la tabla 
    protected $primaryKey = 'codigo'; // Llave primaria de la tabla 
    protected $fillable = ['nombre', 'ubicacion','jefe','numeroEmpleados']; // Campos para asignación másiva
}
