<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prefecture_id')->references('id')->on('prefectures');
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->string('post_code');
            $table->string('post_code_prefix');
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
        Schema::dropIfExists('post_codes');
    }
}
