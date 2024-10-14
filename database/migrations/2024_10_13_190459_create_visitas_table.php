<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->id('codigo');
            $table->dateTime('fechaEntrada');
            $table->dateTime('fechaSalida');
            $table->string('motivo');
            $table->bigInteger('visitante')->unsigned();
            $table->foreign('visitante')->references('codigo')->on('visitantes');
            $table->bigInteger('empleado')->unsigned();
            $table->foreign('empleado')->references('codigo')->on('empleados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitas');
    }
};
