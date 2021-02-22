<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCountyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SubCounty', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->string('Name', 100)->nullable();
            $table->biginteger('County')->nullable()->unsigned()->index();//FK
            $table->timestamps();

            $table->foreign('County')->references('OID')->on('County')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SubCounty');
    }
}
