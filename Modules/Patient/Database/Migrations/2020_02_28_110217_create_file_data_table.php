<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FileData', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->integer('size')->nullable();
            $table->string('FileName', 100)->nullable();
            $table->biginteger('Patient')->nullable()->unsigned()->index();//FK

            $table->foreign('Patient')->references('IDCNO')->on('patient')->onDelete('cascade');
            $table->timestamps();

        });
        DB::statement('ALTER TABLE FileData ADD content LONGBLOB AFTER FileName');
        //DB::statement("ALTER TABLE <table name> ADD <column name> MEDIUMBLOB");

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE FileData DROP content');
        Schema::dropIfExists('FileData');

    }
}
