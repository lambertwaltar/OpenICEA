<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triage', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->date('TriageDate')->nullable();
            $table->biginteger('Patient')->nullable()->unsigned()->index();//FK
            $table->biginteger('Provider')->nullable()->unsigned()->index();//FK
            $table->biginteger('Encounter')->nullable()->unsigned()->index();//FK
            $table->float('BPHigh')->nullable();
            $table->float('BPLow')->nullable();
            $table->float('Temperatue')->nullable();
            $table->float('Weight')->nullable();
            $table->float('Height')->nullable();
            $table->float('MUAC')->nullable();

            //foreign keys
            $table->foreign('Patient')->references('IDCNO')->on('patient')->onDelete('cascade');
            $table->foreign('Provider')->references('OID')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('triage');
    }
}
