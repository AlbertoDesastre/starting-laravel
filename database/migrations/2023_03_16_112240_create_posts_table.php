<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// Este archivo fue creado con el comando php artisan make:migration create_posts_table
class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            
            // Creo la relación con otra tabla en la DB. Luego voy a Factory a crear precisamente este id.
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");

            $table->string('title');
            $table->string('slug')->unique();
            $table->text('body');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
