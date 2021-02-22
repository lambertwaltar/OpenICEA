<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptionItem', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->float('Quantity')->nullable();
            $table->integer('NoOfDays')->nullable();
            $table->date('IssuedDate')->nullable();
            
            $table->biginteger('Prescription')->nullable()->unsigned()->index();//FK
            $table->biginteger('Drug')->nullable()->unsigned()->index();//FK 
            $table->biginteger('Schedule')->nullable()->unsigned()->index();//FK
            $table->biginteger('IssuedBy')->nullable()->unsigned()->index();//FK
            $table->biginteger('DispensingUnit')->nullable()->unsigned()->index();//FK
            $table->biginteger('StockItem')->nullable()->unsigned()->index();//FK
            
            $table->string('PharmacistIssueNotes', 100)->nullable();
            $table->float('UnitPrice')->nullable();
            $table->float('PMargin')->nullable();
            $table->float('TotalCost')->nullable();
            $table->float('QtyIssued')->nullable();

            //foreign keys
            $table->foreign('Prescription')->references('OID')->on('prescription')->onDelete('cascade');
            $table->foreign('Drug')->references('OID')->on('Drug')->onDelete('cascade');
            $table->foreign('IssuedBy')->references('OID')->on('Clinician')->onDelete('cascade');
            $table->foreign('Schedule')->references('OID')->on('Schedule')->onDelete('cascade');
            $table->foreign('DispensingUnit')->references('OID')->on('Store')->onDelete('cascade');
            $table->foreign('StockItem')->references('OID')->on('StockItem')->onDelete('cascade');

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
        Schema::dropIfExists('prescriptionItem');
    }
}
