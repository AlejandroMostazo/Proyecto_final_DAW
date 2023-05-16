<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('nacimiento')->nullable();
            $table->string('genero')->nullable();
            $table->boolean('admin')->default(false);
            $table->unsignedBigInteger('publicacion_id')->nullable();

            $table->foreign('publicacion_id')->references('id')->on('publicaciones')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nacimiento');
            $table->dropColumn('genero');
        });
    }
}
