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
        Schema::create('agentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_departamento');
            $table->unsignedBigInteger('id_grupo');
            $table->string('icono')->nullable(false);
            $table->string('nombre')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('telefono')->unique()->nullable(false);
            $table->enum('estado_agente', ['activo','inactivo','no_disponible'])->default('activo')->nullable(false);
            $table->boolean('estatus')->default(1)->nullable(false);

            $table->foreign('id_departamento')->references('id')->on('departamentos');
            $table->foreign('id_grupo')->references('id')->on('grupos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
