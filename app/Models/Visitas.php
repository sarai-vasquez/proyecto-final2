<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitas extends Model
{
    use HasFactory;
    protected $table = 'visitas'; // Nombre de la tabla 
    protected $primaryKey = 'codigo'; // Llave primaria de la tabla 
    protected $fillable = ['fechaEntrada', 'fechaSalida','motivo','visitante','empleado']; // Campos para asignación másiva
}
