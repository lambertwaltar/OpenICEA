<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncounterTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_type', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->string('Code', 100)->nullable();
            $table->string('Name', 100)->nullable();
            $table->timestamps();
        });

        Schema::create('encounter', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->date('visitDate')->nullable();  
            $table->integer('Visitor')->nullable();
            $table->string('OtherVisitor',100)->nullable();
            $table->integer('VisitType')->nullable();
            $table->integer('OtherVisitType')->nullable();
            $table->date('Return_appointment_date')->nullable();
            $table->string('IsPrivate', 100)->nullable();
            $table->biginteger('Patient')->nullable()->unsigned()->index();//FK
            $table->biginteger('VisitReason')->nullable()->unsigned()->index();//FK
            $table->string('OtherVisitReason', 100)->nullable();
            $table->integer('RepresentationReason')->nullable();
            $table->string('OtherReason',100)->nullable();
            //$table->biginteger('Return_appointment_reason')->nullable()->unsigned()->index();//FK
            //$table->string('Other_return_appointment_reason', 100)->nullable();//FK
            
            $table->foreign('VisitReason')->references('OID')->on('appointment_type')->onDelete('cascade');
            $table->foreign('Patient')->references('IDCNO')->on('patient')->onDelete('cascade');
            //$table->foreign('Return_appointment_reason')->references('OID')->on('appointment_type')->onDelete('cascade');
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
        Schema::dropIfExists('encounter');
        Schema::dropIfExists('appointment_type');
    }
}
