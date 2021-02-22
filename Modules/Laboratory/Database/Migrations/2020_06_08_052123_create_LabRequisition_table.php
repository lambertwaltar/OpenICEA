<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabRequisitionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LabRequisition', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->date('OrderDate')->nullable();
            $table->string('OrderedTime')->nullable();
            $table->date('CollectedDate')->nullable();  
            $table->string('CollectedBy',100)->nullable();
            $table->string('ClinicalNotes',100)->nullable();
            $table->string('SampleCollected',1)->nullable();
            $table->string('Approved',1)->nullable();
            $table->integer('ApprovedBy')->nullable();
            $table->string('PendingApproval',1)->nullable();
            
            // $table->float('PurpleTopTubeML')->nullable();
            // $table->string('RedTopTube',1)->nullable();
            // $table->float('RedTopTubeML')->nullable();
            // $table->string('Urine',1)->nullable();
            // $table->float('UrineML')->nullable();
            // $table->string('BreastMilk',1)->nullable();
            // $table->float('BreastMilkML')->nullable();
            // $table->string('OtherSample',1)->nullable();
            // $table->float('OtherSampleML')->nullable();
            // $table->string('OtherSampleSpecify',100)->nullable();
            // $table->string('SampleComments',100)->nullable();
            // $table->string('Blood',1)->nullable();
            // $table->string('Sputum',1)->nullable();
            // $table->string('Stool',1)->nullable();
            // $table->string('Aspirate',1)->nullable();
            // $table->string('Biopsy',1)->nullable();
            // $table->string('BiopsySpecify',100)->nullable();
            // $table->string('VaginalSwab',1)->nullable();
            // $table->string('CervicalSwab',1)->nullable();
            // $table->string('UrethralSwab',1)->nullable();
            $table->biginteger('Patient')->nullable()->unsigned()->index();//FK
            $table->biginteger('OrderedBy')->nullable()->unsigned()->index();//FK
            $table->biginteger('Encounter')->nullable()->unsigned()->index();//FK

            //foreign keys
            $table->foreign('Patient')->references('IDCNO')->on('patient')->onDelete('cascade');
            $table->foreign('OrderedBy')->references('OID')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('LabRequisition');
    }
}
