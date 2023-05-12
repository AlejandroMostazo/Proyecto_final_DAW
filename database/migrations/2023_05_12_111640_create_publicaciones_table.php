<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('ubicacion_id');
            $table->unsignedBigInteger('deporte_id');
            $table->string('nivel');
            $table->integer('num_max_apuntados');
            $table->integer('ac_apuntados');
            $table->dateTime('fecha_hora');
            $table->timestamps();
            
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
                
            $table->foreign('ubicacion')->references('id')->on('ubicaciones_id')->onDelete('cascade');
                
            $table->foreign('deporte')->references('id')->on('deportes_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicaciones');
    }
}
