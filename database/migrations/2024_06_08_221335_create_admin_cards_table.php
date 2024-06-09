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
        Schema::create('admin_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->text('link');
            $table->text('route');
            $table->timestamps();
        });

        DB::table('admin_cards')->insert(
            array(
                ['title' => 'Cards',
                'description' => 'Manage All Cards by either creating, editing or deleting new or old cards.',
                'link' => 'cardsIndex',
                'route' => "assets/icons/cards.png",
                'created_at' => now(),
                'updated_at' => now(),
                ],
                ['title' => 'Users',
                'description' => 'Manage All Users by either creating, editing or deleting new or old users.',
                'link' => 'usersIndex',
                'route' => 'assets/icons/users.png',
                'created_at' => now(),
                'updated_at' => now(),
                ],
                ['title' => 'Feed',
                'description' => 'Show the 10 latest feeds from multiple categories.',
                'link' => 'feed',
                'route' => 'assets/icons/feed.png',
                'created_at' => now(),
                'updated_at' => now(),
                ],
                ['title' => 'Classrooms',
                'description' => 'Manage All Classrooms by either creating, editing or deleting new or old classrooms.',
                'link' => 'classIndex',
                'route' => 'assets/icons/classrooms.png',
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
        Schema::dropIfExists('admin_cards');
    }
};
