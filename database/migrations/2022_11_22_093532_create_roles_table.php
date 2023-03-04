<?php

use App\Models\Role;
use App\Models\User;
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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Role::factory()->create(['name' => 'client']);

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')
                ->default('1')
                ->references('id')
                ->on('roles')
                ->cascadeOnDelete()
            ;
        });

        User::factory()->create([
            'email' => config('mail.from.address'),
            'role_id' => Role::factory()->create(['name' => 'admin']),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
