<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrugTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Drug', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->string('DrugName', 100)->nullable();
            $table->float('Dose')->nullable();
            $table->integer('Preparation')->nullable();
            $table->integer('Measurement')->nullable();
            $table->string('ShortName', 100)->nullable();
            $table->integer('MediType')->nullable();
            $table->integer('groupidForConversion')->nullable();
            $table->string('NavCode', 100)->nullable();
            $table->integer('ForSale')->nullable();
            $table->float('PMargin')->nullable();
            $table->float('UnitPrice')->nullable();
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
        Schema::dropIfExists('Drug');
    }
}
