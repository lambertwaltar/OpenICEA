<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Parish', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->string('Name', 100)->nullable();
            $table->biginteger('SubCounty')->nullable()->unsigned()->index();//FK
            $table->timestamps();

            $table->foreign('SubCounty')->references('OID')->on('SubCounty')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Parish');
    }
}
