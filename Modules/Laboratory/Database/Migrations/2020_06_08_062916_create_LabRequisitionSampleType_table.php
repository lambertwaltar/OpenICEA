<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabRequisitionSampleTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LabRequisitionSampleType', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->integer('SampleType')->nullable();
            $table->string('OtherSampleType',100)->nullable();  
            $table->integer('LabRequisition')->nullable();

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
        Schema::dropIfExists('LabRequisitionSampleType');
    }
}
