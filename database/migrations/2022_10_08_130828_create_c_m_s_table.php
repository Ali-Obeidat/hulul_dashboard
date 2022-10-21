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
        Schema::create('c_m_s', function (Blueprint $table) {
            $table->id();
            $table->string("theme_color");
            $table->string("logo");
            $table->string("slider_first_image");
            $table->string("slider_second_image");
            $table->string("slider_third_image");
            $table->string("slider_forth_image");
            $table->string("slider_fifth_image");
            $table->string("slider_sixth_image");
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
        Schema::dropIfExists('c_m_s');
    }
};
