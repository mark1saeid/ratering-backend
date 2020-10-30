<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('pp')->nullable();
            $table->string('bio')->nullable();
            $table->string('point')->nullable();
            $table->string('username')->unique();
            $table->string('token','10000')->nullable();
            $table->string('birthday');
            $table->string('gender');
            $table->string('rating');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
          //  $table->timestamps();
            $table->date('created_at');
            $table->date('updated_at');
        });
    }




    public function down()
    {
        Schema::dropIfExists('users');
    }
}
