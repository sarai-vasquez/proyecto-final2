<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitantes extends Model
{
    use HasFactory;
    protected $table = 'visitantes'; // Nombre de la tabla 
    protected $primaryKey = 'codigo'; // Llave primaria de la tabla 
    protected $fillable = ['nombre', 'identificacion','telefono','correo']; // Campos para asignación másiva
}
