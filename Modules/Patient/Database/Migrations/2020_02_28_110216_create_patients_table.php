<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->bigIncrements('IDCNO')->nullable(false);
            $table->date('RegistrationDate')->nullable();       
            $table->string('FirstName', 100)->nullable();
            $table->string('Surname', 100)->nullable();
            $table->string('MiddleName', 100)->nullable();
            $table->string('Initial', 100)->nullable();
            $table->date('BirthDate')->nullable(); 
            $table->integer('Gender')->nullable();
            $table->integer('MaritalStatus')->nullable();
            $table->integer('FollowUpStatus')->nullable()->default('1');
            $table->string('FollowUpStatusSpecify', 400)->nullable();
            $table->date('FollowUpStatusDate')->nullable();
            $table->string('Street', 100)->nullable();
            $table->string('Remarks', 400)->nullable();
            // $table->biginteger('IDPhoto')->nullable()->unsigned()->index();//FK
            $table->string('IDCardProduced', 1)->default('0');
            $table->date('IDCardDate')->nullable();
            // $table->biginteger('Fingerprint')->nullable()->unsigned()->index();//FK
            $table->string('FingerprintDescription', 100)->nullable();
            $table->string('OtherReferral', 100)->nullable();
            $table->biginteger('Tribe')->nullable()->unsigned()->index();//FK
            $table->biginteger('Referral')->nullable()->unsigned()->index();//FK
            $table->biginteger('Country')->nullable()->unsigned()->index();//FK
            $table->biginteger('District')->nullable()->unsigned()->index();//FK
            $table->biginteger('County')->nullable()->unsigned()->index();//FK
            $table->biginteger('SubCounty')->nullable()->unsigned()->index();//FK
            $table->biginteger('Parish')->nullable()->unsigned()->index();//FK
            $table->biginteger('Village')->nullable()->unsigned()->index();//FK
            $table->integer('ChartStatus')->nullable();
            $table->biginteger('ChartLocation')->nullable()->unsigned()->index();//FK
            $table->biginteger('Religion')->nullable()->unsigned()->index();//FK
            $table->biginteger('SpecifyKCCAClinic')->nullable()->unsigned()->index();//FK
            $table->integer('ReferralLetter')->nullable();
            $table->biginteger('Provider')->nullable()->unsigned()->index();//FK
            $table->string('Zone', 100)->nullable();
            $table->string('LandLord', 100)->nullable();
            $table->string('ProminentLeader', 100)->nullable();
            $table->string('NeighbourFeature', 100)->nullable();
            $table->string('CommonName', 100)->nullable();
            $table->integer('IDIStaffIndentification')->nullable();
            $table->string('OtherIDIStaffIndentification', 100)->nullable();
            $table->integer('ProblemWithVisting')->nullable();
            $table->string('DetailedDirection')->nullable();
            $table->timestamps();
            //foreign keys
            // $table->foreign('IDPhoto')->references('OID')->on('FileData')->onDelete('cascade');
            // $table->foreign('Fingerprint')->references('OID')->on('FileData')->onDelete('cascade');
            $table->foreign('Tribe')->references('OID')->on('Tribe')->onDelete('cascade');
            $table->foreign('Referral')->references('OID')->on('Referral')->onDelete('cascade');
            $table->foreign('Country')->references('OID')->on('Country')->onDelete('cascade');
            $table->foreign('District')->references('OID')->on('District')->onDelete('cascade');
            $table->foreign('County')->references('OID')->on('County')->onDelete('cascade');
            $table->foreign('SubCounty')->references('OID')->on('SubCounty')->onDelete('cascade');
            $table->foreign('Parish')->references('OID')->on('Parish')->onDelete('cascade');
            $table->foreign('Village')->references('OID')->on('Village')->onDelete('cascade');
            $table->foreign('ChartLocation')->references('OID')->on('ChartLocation')->onDelete('cascade');
            $table->foreign('Religion')->references('OID')->on('Religion')->onDelete('cascade');
            $table->foreign('SpecifyKCCAClinic')->references('OID')->on('KCCAClinic')->onDelete('set null');
            $table->foreign('Provider')->references('OID')->on('users')->onDelete('cascade');


        });


        DB::table('patient')->insert([
            'RegistrationDate'=>'2020-02-28 12:38:00',
            'FirstName' => 'Lambert',
            'Surname' => 'Byarugaba',
            'Initial' => 'LB',
            'Gender' => 1,
            'MaritalStatus' => 2,
            'FollowUpStatus'=>1,
        ]);

        DB::table('patient')->insert([
            'RegistrationDate'=>'2020-03-02 12:38:00',
            'FirstName' => 'System',
            'Surname' => 'Administrator',
            'Initial' => 'SA',
            'Gender' => 1,
            'MaritalStatus' => 3,
            'FollowUpStatus'=>2,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
