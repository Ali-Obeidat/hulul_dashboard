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
        Schema::create('qucs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->unique();
            $table->string('Q1_residentAmerican')->nullable();
            $table->string('Q2_PEP')->nullable();
            $table->string('Q3_purpose_of_open')->nullable();
            $table->string('Q4_money_amount')->nullable();
            $table->string('Q5_Income_Investments')->nullable();
            $table->string('Q6_annual_income')->nullable();
            $table->string('Q7_Available_Amount')->nullable();
            $table->string('Q8_funding_source')->nullable();
            $table->string('Q9_country_source_funds')->nullable();
            $table->string('Q10_status')->nullable();
            $table->string('Q11_field_of_study')->nullable();
            $table->string('Q12_Educational_level')->nullable();
            $table->string('Q11_Employment')->nullable();
            $table->string('Q12_job_position')->nullable();
            $table->string('Q13_Educational_level')->nullable();
            $table->string('Q14_Experience_Trading')->nullable();
            $table->string('Q15_Attend_course')->nullable();
            $table->string('Q16_trained_demo_accounts')->nullable();
            $table->string('Q17_Stocks_Bonds')->nullable();
            $table->string('Q18_Traded_Derivative_Contracts')->nullable();
            $table->string('Q19_Gold')->nullable();
            $table->string('Q20_Exchange_Rates')->nullable();
            $table->string('Q21_Trading_account_leverage')->nullable();
            $table->string('Q22_Open_deal_at_night')->nullable();
            $table->string('Q23_Stop')->nullable();
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
        Schema::dropIfExists('qucs');
    }
};
