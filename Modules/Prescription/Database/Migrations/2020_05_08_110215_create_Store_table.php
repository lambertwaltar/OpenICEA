<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Store', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->string('Name', 100)->nullable();
            $table->string('IsMain',1)->nullable();
            $table->string('Active',1)->nullable();
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
        Schema::dropIfExists('Store');
    }
}
