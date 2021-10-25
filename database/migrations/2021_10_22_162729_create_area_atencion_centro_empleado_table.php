<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaAtencionCentroEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_atencion_centro_empleado', function (Blueprint $table) {
            $table->id();

            // areas de atencion
            $table->unsignedBigInteger('area_atencion_centro_id');
            $table->foreign('area_atencion_centro_id')->references('id')->on('area_atencion_centro');

            // empleados
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id')->references('id')->on('empleados');

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
        Schema::dropIfExists('area_atencion_centro_empleado');
    }
}
