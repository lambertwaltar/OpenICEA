<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSampleTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SampleType', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->string('Name')->nullable();
            $table->timestamps();
        });

        DB::table('SampleType')->insert(['Name'=>'Blood']);
        DB::table('SampleType')->insert(['Name'=>'Aspirate']);
        DB::table('SampleType')->insert(['Name'=>'Urine']);
        DB::table('SampleType')->insert(['Name'=>'Sputum']);
        DB::table('SampleType')->insert(['Name'=>'Stool']);
        DB::table('SampleType')->insert(['Name'=>'Breast Milk']);
        DB::table('SampleType')->insert(['Name'=>'Cervical Swab']);
        DB::table('SampleType')->insert(['Name'=>'Urethral Swab']);
        DB::table('SampleType')->insert(['Name'=>'Vaginal Swab']);
        DB::table('SampleType')->insert(['Name'=>'Biopsy']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SampleType');
    }
}
