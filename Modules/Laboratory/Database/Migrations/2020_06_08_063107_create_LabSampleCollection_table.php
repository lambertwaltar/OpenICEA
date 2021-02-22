<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabSampleCollectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LabSampleCollection', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->date('CollectedDate')->nullable();
            $table->integer('IsGeneralRequisition')->nullable();
            $table->integer('IsHIVScreening')->nullable();
            $table->integer('IsCoreLabRequisition')->nullable();
            $table->biginteger('LabRequisition')->nullable()->unsigned()->index();//FK
            $table->biginteger('CollectedBy')->nullable()->unsigned()->index();//FK
            $table->biginteger('Patient')->nullable()->unsigned()->index();//FK
            $table->biginteger('Encounter')->nullable()->unsigned()->index();//FK
            //foreign keys
            $table->foreign('LabRequisition')->references('OID')->on('LabRequisition')->onDelete('cascade');
            $table->foreign('CollectedBy')->references('OID')->on('users')->onDelete('cascade');
            $table->foreign('Patient')->references('IDCNO')->on('patient')->onDelete('cascade');
            $table->foreign('Encounter')->references('OID')->on('encounter')->onDelete('cascade');
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
        Schema::dropIfExists('LabSampleCollection');
    }
}
