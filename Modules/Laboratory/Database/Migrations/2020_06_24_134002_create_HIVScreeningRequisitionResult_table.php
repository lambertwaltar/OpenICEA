<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHIVScreeningRequisitionResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HIVScreeningRequisitionResult', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->string('PurpleTopTube',1)->nullable();
            $table->string('RedTopTube',1)->nullable();
            $table->string('OtherSample',1)->nullable();
            $table->string('OtherSampleSpecify',100)->nullable();
            $table->date('CollectionDate')->nullable(); 
            $table->string('CollectionTime')->nullable();
            $table->string('SampleComments',100)->nullable();
            $table->date('TestDate')->nullable();
            $table->string('AIDSDefiningIllness',100)->nullable();
            $table->integer('OptionADoctor')->nullable();
            $table->integer('OptionBDoctor_Counsellor')->nullable();
            $table->string('Comment',100)->nullable(); 
            $table->integer('SingleTest')->nullable();
            $table->integer('HIVScreeningOption')->nullable();
            $table->integer('ScreeningTest')->nullable();
            $table->integer('TieBreakerTest')->nullable();
            $table->integer('ConfirmationTest')->nullable();
            $table->string('FinalResult',100)->nullable();
            $table->biginteger('Patient')->nullable()->unsigned()->index();//FK
            $table->biginteger('TestedBy')->nullable()->unsigned()->index();//FK
            $table->biginteger('LabRequisition')->nullable()->unsigned()->index();//FK
            $table->biginteger('LabSampleCollection')->nullable()->unsigned()->index();//FK
            $table->biginteger('Encounter')->nullable()->unsigned()->index();//FK

            //foreign keys
            $table->foreign('Patient')->references('IDCNO')->on('patient')->onDelete('cascade');
            $table->foreign('TestedBy')->references('OID')->on('users')->onDelete('cascade');
            $table->foreign('LabRequisition')->references('OID')->on('LabRequisition')->onDelete('cascade');
            $table->foreign('LabSampleCollection')->references('OID')->on('LabSampleCollection')->onDelete('cascade');
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
        Schema::dropIfExists('HIVScreeningRequisitionResult');
    }
}
