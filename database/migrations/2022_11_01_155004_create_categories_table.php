<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\NestedSet;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->nestedSet();
            $table->timestamps();
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->foreignId('category_id')->references('id')->on('categories');
        });

        // Schema::create('car_category', function (Blueprint $table) {
        //     $table->foreignId('car_id')->references('id')->on('cars');
        //     $table->foreignId('category_id')->references('id')->on('categories');
        //     $table->primary(['category_id', 'car_id']);
        // });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_category');
        Schema::dropIfExists('categories');
    }
};
