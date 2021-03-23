<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseWithdrawRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_withdraw_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('case_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('fine')->nullable();
            $table->string('service_charge')->nullable();
            $table->string('total')->nullable();
            $table->string('cheque_number')->nullable();
            $table->string('account_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('mobile_operator')->nullable();
            $table->string('tax_transaction_id')->nullable();
            $table->string('reference')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('courier_address')->nullable();
            $table->string('status')->nullable();
            $table->string('admin_id')->nullable();
            $table->string('date')->nullable();
            $table->string('delete_status')->default(1);
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
        Schema::dropIfExists('case_withdraw_requests');
    }
}
