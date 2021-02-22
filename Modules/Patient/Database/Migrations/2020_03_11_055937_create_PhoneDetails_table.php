<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhoneDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PhoneDetails', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);;
            $table->string('PhoneNumber', 100)->nullable();
            $table->string('Description', 500)->nullable();
            $table->biginteger('Patient')->nullable()->unsigned()->index();//FK
            $table->string('Relationship', 100)->nullable();
            $table->string('SelfContact', 1)->default('0')->nullable();
            $table->string('FirstName', 100)->nullable();
            $table->string('Surname', 100)->nullable();
            $table->string('CanBeContacted', 1)->default('0') ->nullable();
            $table->string('HaveDisclosed', 1)->default('0') ->nullable();
            $table->string('TamaNumber', 100)->nullable();
            $table->integer('TAMACategory')->nullable();
            $table->timestamps();


            $table->foreign('Patient')->references('IDCNO')->on('Patient')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PhoneDetails');
    }
}
