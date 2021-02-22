<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Clinician', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->string('Number', 100)->nullable();
            $table->string('FirstName', 100)->nullable();
            $table->string('Surname', 100)->nullable();
            $table->integer('ClinicianType')->nullable();
            $table->string('active', 1)->nullable();
            // $table->biginteger('Signature')->nullable()->unsigned()->index();//FK
            // $table->foreign('Signature')->references('OID')->on('FileData')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Clinician');
    }
}
