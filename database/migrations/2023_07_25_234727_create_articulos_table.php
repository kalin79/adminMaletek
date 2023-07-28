<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->integer('blog_id');
            $table->string('slug');
            $table->string('titulo');
            $table->string('sub_titulo')->nullable();
            $table->date("fecha")->nullable();
            $table->string('etiqueta')->nullable();
            $table->text('contenido')->nullable();
            $table->string('imagen_banner')->nullable();
            $table->string('imagen_banner_mobile')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('created_user_id')->nullable();
            $table->integer('updated_user_id')->nullable();
            $table->integer('deleted_user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
