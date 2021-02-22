<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('OID');
            $table->date('ReturnDate')->nullable();
            $table->string('ReturnTime')->nullable();
            $table->biginteger('Patient')->nullable()->unsigned()->index();//FK
            $table->biginteger('ReturnReason')->nullable()->unsigned()->index();//FK
            
            $table->foreign('ReturnReason')->references('OID')->on('appointment_type')->onDelete('cascade');
            $table->foreign('Patient')->references('IDCNO')->on('patient')->onDelete('cascade');

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
        Schema::dropIfExists('appointments');
    }
}
