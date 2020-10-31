<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Status extends Migration
{
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->string('publisher_id');
            $table->string('status_rating')->nullable();
            $table->string('status_text')->nullable();
            $table->string('status_image')->nullable();
            $table->string('status_video')->nullable();
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('status');
    }
}
