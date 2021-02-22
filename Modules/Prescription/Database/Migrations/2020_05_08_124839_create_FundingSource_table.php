<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundingSourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FundingSource', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->string('Code', 100)->nullable();
            $table->string('Name', 100)->nullable();
            $table->string('Specifiable', 1)->nullable();
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
        Schema::dropIfExists('FundingSource');
    }
}
