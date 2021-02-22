<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('OID');
            $table->string('Name',100)->nullable();
            $table->string('Description',240)->nullable();
            $table->string('url',240)->nullable();
            $table->string('Status',100)->nullable();
            $table->timestamps();
        });

        DB::table('settings')->insert([
            'Name' => 'Return Appointments',
            'Status' => 'Disabled',
            'Description'=>'If enabled, some functions will depend on whether a return appointment is assigned to a client',
            'url'=>'{{route("rasetting")}}',
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
