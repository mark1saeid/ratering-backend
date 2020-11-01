<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Post extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('publisher_id');
            $table->string('post_rating')->nullable();
            $table->string('post_text')->nullable();
            $table->string('post_link')->nullable();
            $table->string('post_image')->nullable();
            $table->string('post_video')->nullable();
            $table->string('views');
            $table->string('impression');
            $table->string('impression_24');
            $table->date('created_at');
            $table->date('updated_at');
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
