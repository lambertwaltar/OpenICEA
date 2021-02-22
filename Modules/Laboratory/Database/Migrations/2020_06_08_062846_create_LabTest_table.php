<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LabTest', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->string('TestName',100)->nullable();
            $table->integer('RequiresApproval')->nullable();
            $table->integer('TypeOfLabTest')->nullable();
            $table->biginteger('Sample')->nullable()->unsigned()->index();//FK

            $table->foreign('Sample')->references('OID')->on('SampleType')->onDelete('cascade');
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
        Schema::dropIfExists('LabTest');
    }
}
