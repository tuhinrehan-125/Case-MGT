<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleaseCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('release_cases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('forward_accept_id')->nullable();
            $table->string('case_id')->nullable();
            $table->string('case_no')->nullable();
            $table->string('unit_id')->nullable();
            $table->string('release_status')->nullable();
            $table->string('release_user')->nullable();
            $table->string('release_date')->nullable();
            $table->string('packet_no')->nullable();
            $table->string('box_no')->nullable();
            $table->string('service_charge')->nullable();
            $table->string('total_fine')->nullable();
            $table->string('consider')->nullable();
            $table->string('total')->nullable();
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('release_cases');
    }
}
