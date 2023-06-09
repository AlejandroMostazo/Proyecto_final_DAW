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
            $table->unsignedBigInteger('user_id')->unique();
            $table->unsignedBigInteger('ubicacion_id');
            $table->unsignedBigInteger('deporte_id');
            $table->string('nivel');
            $table->integer('num_max_apuntados');
            $table->integer('ac_apuntados');
            $table->dateTime('fecha_hora');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                
            $table->foreign('ubicacion_id')->references('id')->on('ubicaciones')->onDelete('cascade');
                
            $table->foreign('deporte_id')->references('id')->on('deportes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publicaciones', function (Blueprint $table) {
            $table->dropForeign('user_id', 'ubicacion_id', 'deporte_id');
        });
        Schema::dropIfExists('publicaciones');
    }
}
