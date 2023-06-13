<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('type');
            $table->string('location');
            $table->string('price');
            $table->string('email');
            $table->string('description');
            $table->string('mobile');
            $table->string('companyName');
            $table->string('fileName');
            $table->string('fileName1');
            $table->string('fileName2');
            $table->string('fileName3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
};
