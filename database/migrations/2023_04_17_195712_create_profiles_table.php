<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->references('id')->on('users')->cascadeOnDelete();
            $table->string('telegram')->nullable();
            $table->text('about')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
