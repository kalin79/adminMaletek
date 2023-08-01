<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->integer('producto_id');
            $table->integer('cantidad')->default(0);
            $table->string('nombres_apellidos')->nullable();
            $table->string('numero_documento')->nullable();
            $table->string('email')->nullable();
            $table->string('celular')->nullable();
            $table->text('comentario')->nullable();
            $table->integer('tyc')->default(1);
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
        Schema::dropIfExists('cotizaciones');
    }
}
