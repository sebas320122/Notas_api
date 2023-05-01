<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('autor');
            $table->timestamp('horaFecha');
            $table->string('descripcion');

            //llave foranea
            $table->unsignedBigInteger('id_clasificacion')->nullable(); 
            $table->foreign('id_clasificacion') 
            ->nullable()
            ->references('id_clasificacion') 
            ->on('clasificacions') 
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
