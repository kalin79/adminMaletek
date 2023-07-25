<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('producto_color_images', function (Blueprint $table) {
            $table->id();
            $table->integer('producto_color_id')->nullable();
            $table->string('imagen')->nullable();
            $table->integer('is_default')->nullable();

            $table->boolean('active')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->integer('created_user_id')->nullable();
            $table->integer('updated_user_id')->nullable();
            $table->integer('deleted_user_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_color_images');
    }
};
