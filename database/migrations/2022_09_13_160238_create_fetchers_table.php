<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFetchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fetchers', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('mi');
            $table->string('address');
            $table->string('email');
            $table->string('contactno');
            $table->string('image');
            $table->enum('verification', [0, 1])->default(0);
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
        Schema::dropIfExists('fetchers');
    }
}
