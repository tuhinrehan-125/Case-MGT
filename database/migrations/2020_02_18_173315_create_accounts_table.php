<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('release_id')->nullable();
            $table->string('unit_id')->nullable();
            $table->string('case_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('cheque_number')->nullable();
            $table->string('account_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('mobile_operator')->nullable();
            $table->string('tax_transaction_id')->nullable();
            $table->string('reference')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('total')->nullable();
            $table->string('user_id')->nullable();
            $table->string('delete_status')->default(1);
            $table->string('date')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
