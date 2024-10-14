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
        Schema::create('tramites', function (Blueprint $table) {
            $table->id('codigo');
            $table->string('tipo',100);
            $table->dateTime('fechaInicio');
            $table->dateTime('fechaFin');
            $table->string('descripcion',200);
            $table->bigInteger('visita')->unsigned();
            $table->foreign('visita')->references('codigo')->on('visitas');
            $table->bigInteger('estado')->unsigned();
            $table->foreign('estado')->references('codigo')->on('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramites');
    }
};
