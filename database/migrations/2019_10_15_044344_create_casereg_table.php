<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseregTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casereg', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_mp')->nullable();
            $table->string('unit_id')->nullable();
            $table->string('case_no')->unique()->nullable();
            $table->string('packet_number')->unique()->nullable();
            $table->string('victim_name')->nullable();
            $table->string('victim_mb')->nullable();
            $table->string('vehical_reg')->nullable();
            $table->string('date_off')->nullable();
            $table->string('time_off')->nullable();
            $table->string('date_disposal')->nullable();
            $table->string('time_disposal')->nullable();
            $table->string('loc')->nullable();
            $table->string('vehical_type')->nullable();
            $table->string('victim')->nullable();
            $table->longText('crime_type')->nullable();
            $table->longText('paper')->nullable();
            // $table->string('paper_number')->nullable();
            $table->string('forwared')->default('0')->nullable();
            $table->string('drop_type')->default('0')->nullable();
            $table->string('drop_status')->default('0')->nullable();
            $table->string('accept')->default('0')->nullable();
            $table->string('forwared_cantroment')->default('0')->nullable();
            $table->string('paid')->default('0')->nullable();
            $table->string('delete_status')->default('0')->nullable();
            $table->string('paper_image')->nullable();
            $table->string('others_image')->nullable();

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
        Schema::dropIfExists('casereg');
    }
}
