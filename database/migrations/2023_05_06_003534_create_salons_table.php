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
        Schema::create('salons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('address');
            $table->string('phone');
            $table->string('work_hours');
            $table->timestamps();
        });

        Schema::create('car_salon', function (Blueprint $table) {
            $table->foreignId('salon_id')->references('id')->on('salons')->cascadeOnDelete();
            $table->foreignId('car_id')->references('id')->on('cars')->cascadeOnDelete();
            $table->integer('count')->nullable();
            $table->timestamps();
        });

        Schema::table('test_drives', function (Blueprint $table) {
            $table->foreignId('salon_id')->references('id')->on('salons');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salons');
        Schema::dropColumns('test_drives', 'salon_id');
    }
};
