<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->date('PrescriptionDate')->nullable();
            $table->biginteger('Patient')->nullable()->unsigned()->index();//FK
            $table->biginteger('ParentPrescription')->nullable()->unsigned()->index();//FK
            $table->biginteger('Provider')->nullable()->unsigned()->index();//FK
            $table->biginteger('Encounter')->nullable()->unsigned()->index();//FK
            $table->biginteger('ArtRegimen')->nullable()->unsigned()->index();//FK 
            $table->string('idcnoForConversion', 6)->nullable();
            $table->integer('visitnoForConversion')->nullable();
            $table->integer('prescriptionIDForConversion')->nullable();
            $table->string('Notes', 100)->nullable();
            $table->date('DatePrinted')->nullable();
            $table->integer('PrescriptionMonths')->nullable();
            $table->integer('PharmacyVisit')->nullable();
            $table->string('AntibioticReason', 100)->nullable();
            $table->integer('DSDM_Type')->nullable();

            //foreign keys
            $table->foreign('Patient')->references('IDCNO')->on('patient')->onDelete('cascade');
            $table->foreign('ParentPrescription')->references('OID')->on('prescription')->onDelete('cascade');
            $table->foreign('Provider')->references('OID')->on('Clinician')->onDelete('cascade');
            $table->foreign('Encounter')->references('OID')->on('encounter')->onDelete('cascade');
            $table->foreign('ArtRegimen')->references('OID')->on('regimen')->onDelete('cascade');

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
        Schema::dropIfExists('prescription');
    }
}
