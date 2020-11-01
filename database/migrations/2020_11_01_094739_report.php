<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Report extends Migration
{
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->id();
            $table->string('publisher_id');
            $table->string('post_id')->nullable();
            $table->string('profile_id')->nullable();
            $table->string('status_id')->nullable();
            $table->string('screen_shot')->nullable();
            $table->string('about');
            $table->string('reason');
            $table->string('status');
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('report');
    }
}
