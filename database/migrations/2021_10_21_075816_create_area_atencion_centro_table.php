<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaAtencionCentroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_atencion_centro', function (Blueprint $table) {
            $table->id();

            // centro
            $table->unsignedBigInteger('centro_id');
            $table->foreign('centro_id')->references('id')->on('centros');

            // areas de atencion
            $table->unsignedBigInteger('area_atencion_id');
            $table->foreign('area_atencion_id')->references('id')->on('areas_atencion');

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
        Schema::dropIfExists('centro_area_atencion');
    }
}
