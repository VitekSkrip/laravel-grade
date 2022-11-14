<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_image', function (Blueprint $table) {
            $table->foreignId('car_id')->references('id')->on('cars')->cascadeOnDelete();
            $table->foreignId('image_id')->unique()->references('id')->on('images')->cascadeOnDelete();

            $table->primary(['car_id', 'image_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_image');
    }
};
