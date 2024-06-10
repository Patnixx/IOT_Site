<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role')->default('user');
            $table->string('password');
            $table->string('rfid')->unique()->nullable();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                [
                'name' => 'Admin',
                'email' => 'admin@app.com',
                'role' => 'Admin',
                'password' => Hash::make('Jebemboha'),
                'created_at' => now(),
                'updated_at' => now()],

                [
                'name' => 'Scheidt Bachmann',
                'email' => 'scheidt@bachmann.com',
                'role' => 'User',
                'password' => Hash::make('spsit-iot'),
                'created_at' => now(),
                'updated_at' => now()
                ],
                [
                'name' => 'Peter Remiš',
                'email' => 'p.remis@spsit.sk',
                'role' => 'Teacher',
                'password' => Hash::make('arduino-master'),
                'created_at' => now(),
                'updated_at' => now()
                ],
                [
                'name' => 'Lenka Vnuková',
                'email' => 'matikaontop@spsit.sk',
                'role' => 'Teacher',
                'password' => Hash::make('dvanadruhu'),
                'created_at' => now(),
                'updated_at' => now()
                    ],
                [
                'name' => 'Jozef Krajčovič',
                'email' => 'jozefko.krajcik@gmail.com',
                'role' => 'Student',
                'password' => Hash::make('fetak1448'),
                'created_at' => now(),
                'updated_at' => now()
                ]
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
