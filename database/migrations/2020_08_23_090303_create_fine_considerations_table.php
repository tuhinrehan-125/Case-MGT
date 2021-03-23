<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFineConsiderationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fine_considerations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('case_id')->nullable();
            $table->string('forward_id')->nullable();
            $table->string('comments')->nullable();
            $table->string('amount')->nullable();
            $table->string('user_id')->nullable();
            $table->string('delete_status')->default(1);
            $table->string('date')->date('dd-m-Y');
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
        Schema::dropIfExists('fine_considerations');
    }
}
