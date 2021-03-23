<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForwadAcceptCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forwad_accept_cases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('case_id')->nullable();
            $table->string('case_no')->nullable();
            $table->string('unit_id')->nullable();
            $table->string('forward_status')->nullable();
            $table->string('forward_user')->nullable();
            $table->string('accept_status')->default(0);
            $table->string('accept_user')->default(0);
            $table->string('box_no')->default(0);
            $table->string('delete_status')->default(1);
            $table->string('drop_status')->default(0);
            $table->string('drop_user')->nullable();
            $table->string('forward_date')->nullable();
            $table->string('accept_date')->nullable();
            $table->string('release_status')->nullable();
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
        Schema::dropIfExists('forwad_accept_cases');
    }
}
