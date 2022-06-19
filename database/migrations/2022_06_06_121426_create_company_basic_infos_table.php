<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyBasicInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_basic_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('users')->onDelete('cascade')->unique();
            $table->text('company_img')->nullable();
            $table->string('company_name')->nullable();
            $table->string('representative_name')->nullable();
            $table->string('representative_position')->nullable();
            $table->date('Created_date')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('second_phone')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('adders')->nullable();
            $table->string('zip_code')->nullable();
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
        Schema::dropIfExists('company_basic_infos');
    }
}
