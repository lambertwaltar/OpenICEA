<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('StockItem', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->string('BarCode', 100)->nullable();
            $table->string('Description', 100)->nullable();
            $table->integer('IsDrug')->nullable();
            $table->biginteger('FundingSource')->nullable()->unsigned()->index();//FK
            $table->biginteger('UnitDescription')->nullable()->unsigned()->index();//FK
            $table->biginteger('Drug')->nullable()->unsigned()->index();//FK
            $table->biginteger('Location')->nullable()->unsigned()->index();//FK
            $table->biginteger('UnitOfMeasurement')->nullable()->unsigned()->index();//FK 
            $table->biginteger('ProductGroup')->nullable()->unsigned()->index();//FK
            $table->biginteger('StorageCondition')->nullable()->unsigned()->index();//FK 
            $table->float('UnitsOfIssue')->nullable();
            $table->float('QPU')->nullable();
            $table->float('MinStockLevel')->nullable();
            $table->float('MaxStockLevel')->nullable();
            $table->string('Active', 1)->nullable();
            
            //foreign keys
            $table->foreign('FundingSource')->references('OID')->on('FundingSource')->onDelete('cascade');
            $table->foreign('UnitDescription')->references('OID')->on('UnitDescription')->onDelete('cascade');
            $table->foreign('Drug')->references('OID')->on('Drug')->onDelete('cascade');
            $table->foreign('Location')->references('OID')->on('Location')->onDelete('cascade');
            $table->foreign('UnitOfMeasurement')->references('OID')->on('UnitOfMeasurement')->onDelete('cascade');
            $table->foreign('ProductGroup')->references('OID')->on('ProductGroup')->onDelete('cascade');
            $table->foreign('StorageCondition')->references('OID')->on('Condition')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('StockItem');
    }
}
