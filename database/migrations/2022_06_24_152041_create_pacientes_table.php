<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('caso')->unique()->comment('número de caso');
            // $table->string('codigo_paciente')->unique()->comment('código de paciente');
            $table->date('fecha');
            $table->time('hora');
            $table->string('nombres');
            // $table->string('apellidos');
            $table->string('edad');
            $table->boolean('sexo'); //0->male, 1->female
            $table->text('direccion');
            $table->string('telefono', 8);
            $table->string('telefono_referencia', 8);
            $table->string('estado_civil'); // estado civil actual
            $table->string('anios'); // años que lleva estado en ese estado civil
            $table->string('nombre_esposo');
            $table->string('edad_esposo');
            $table->string('grado_instruccion'); // hasta que grado llegó
            $table->string('cantidad_hijos'); // pedir nombre, sexo, edad de la cantidad de hijos
            /** para la cantidad de hijos, se debe crear otra tabla y otro formulario donde los inputs serán dinámicos de acuerdo al número de hijos. */

            $table->string('ocupacion');
            $table->float('ingreso_mensual', 8, 2);
            $table->longText('motivo_consulta');
            // Entrevista Inicial
            $table->longText('historia_familiar');
            // Estructura y dinámica familiar
            $table->enum('tipo_familia', ['monoparental', 'nuclear', 'extensa', 'ampliada', 'reconstituida']);
            $table->enum('tipo', ['funcional', 'disfuncional']);
            // Relaciones familiares .> otra tabla que tendrá el id del paciente, id del tipo y id de la categoría
            /* $table->enum('conyugal', ['estables', 'estrecho', 'distante', 'conflictivo', 'otros']);
            $table->enum('materno', ['estables', 'estrecho', 'distante', 'conflictivo', 'otros']);
            $table->enum('paterno', ['estables', 'estrecho', 'distante', 'conflictivo', 'otros']);
            $table->enum('fraterno', ['estables', 'estrecho', 'distante', 'conflictivo', 'otros']); */
            $table->string('conyugal');
            $table->string('materno');
            $table->string('paterno');
            $table->string('fraterno');


            $table->text('diagnostico_social');
            $table->longText('acciones');
            // $table->boolean('asignacion')->default(0)->nullable();
            // $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');//encargada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
};
