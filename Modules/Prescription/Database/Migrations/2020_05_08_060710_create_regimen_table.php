<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegimenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regimen', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->string('Code', 100)->nullable();
            $table->string('FormattedCode', 100)->nullable();
            $table->integer('Type')->nullable();
            $table->string('OnPrePrinted', 1)->nullable();
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
        Schema::dropIfExists('regimen');
    }
}
