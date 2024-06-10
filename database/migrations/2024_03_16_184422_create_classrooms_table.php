<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class_num')->unique();
            $table->string('teacher')->nullable();
            $table->string('status');
            $table->string('time')->format('H:i:s');
            $table->timestamps();
        });

        DB::table('classrooms')->insert(
            array(
                [
                    'class_num' => '402',
                    'teacher' => null,
                    'status' => 'Closed',
                    'time'=> now()->format('H:i:s'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'class_num' => '404',
                    'teacher' => null,
                    'status' => 'Closed',
                    'time'=> now()->format('H:i:s'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'class_num' => '406',
                    'teacher' => null,
                    'status' => 'Closed',
                    'time'=> now()->format('H:i:s'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'class_num' => '408',
                    'teacher' => null,
                    'status' => 'Closed',
                    'time'=> now()->format('H:i:s'),
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
        Schema::dropIfExists('classrooms');
    }
};
