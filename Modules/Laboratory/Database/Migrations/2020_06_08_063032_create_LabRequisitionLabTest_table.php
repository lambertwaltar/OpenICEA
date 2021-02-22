<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabRequisitionLabTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LabRequisitionLabTest', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->biginteger('LabRequisition')->nullable()->unsigned()->index();//FK
            $table->biginteger('LabTest')->nullable()->unsigned()->index();//FK
            //foreign keys
            $table->foreign('LabRequisition')->references('OID')->on('LabRequisition')->onDelete('cascade');
            $table->foreign('LabTest')->references('OID')->on('LabTest')->onDelete('cascade');
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
        Schema::dropIfExists('LabRequisitionLabTest');
    }
}
