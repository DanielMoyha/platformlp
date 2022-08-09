<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasantes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('carnet');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('universidad');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->boolean('estado')->default('1');//1 activo, 0 inactivo
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasantes');
    }
};
