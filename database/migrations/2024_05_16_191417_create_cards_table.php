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
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rfid')->unique();
            $table->string('type');
            $table->integer('owner_id')->unique()->nullable();
            $table->timestamps();
        });

        DB::table('cards')->insert(
            array(
                [
                    'rfid' => '53 C0 68 03',
                    'type' => 'Card',
                    'owner_id' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'rfid' => 'D3 AA 2A 35',
                    'type' => 'Card',
                    'owner_id' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'rfid' => 'F3 59 F2 CC',
                    'type' => 'Chip',
                    'owner_id' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'rfid' => 'C7 32 9D 60',
                    'type' => 'Chip',
                    'owner_id' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'rfid' => '51 00 FC 20',
                    'type' => 'Card',
                    'owner_id' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'rfid' => 'FB D3 60 0D',
                    'type' => 'Chip',
                    'owner_id' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
