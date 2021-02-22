<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Village', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->string('Name', 100)->nullable();
            $table->biginteger('Parish')->nullable()->unsigned()->index();//FK
            $table->timestamps();

            $table->foreign('Parish')->references('OID')->on('Parish')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Village');
    }
}
