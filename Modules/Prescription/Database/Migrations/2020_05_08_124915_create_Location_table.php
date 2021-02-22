<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Location', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->string('Name', 100)->nullable();
            $table->biginteger('Store')->nullable()->unsigned()->index();//FK 

            $table->foreign('Store')->references('OID')->on('Store')->onDelete('cascade');
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
        Schema::dropIfExists('Location');
    }
}
