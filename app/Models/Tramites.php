<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramites extends Model
{
    use HasFactory;
    protected $table = 'tramites'; // Nombre de la tabla 
    protected $primaryKey = 'codigo'; // Llave primaria de la tabla 
    protected $fillable = ['tipo', 'fechaInicio','fechaFin','descripcion','visita','estado']; // Campos para asignación másiva
}
