<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposit_withdraws', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('account_id')->references('id')->on('mt_hululs')->onDelete('cascade');
            $table->string('type');
            $table->string('bank_name');
            $table->string('recipient_name');
            $table->string('account_number');
            $table->string('transfer_currency');
            $table->text('Remittance_notices')->nullable();
            $table->string('amount_transferred');
            $table->string('status');
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
        Schema::dropIfExists('deposit_withdraws');
    }
}
