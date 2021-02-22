<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralRequisitionResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GeneralRequisitionResult', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->string('PurpleTopTube',1)->nullable();
            $table->string('RedTopTube',1)->nullable();
            $table->string('Urine',1)->nullable();
            $table->string('Sputum',1)->nullable();
            $table->string('FingerPrick',1)->nullable();
            $table->string('OtherSample',1)->nullable();
            $table->string('OtherSampleSpecify',100)->nullable();
            $table->date('CollectionDate')->nullable(); 
            $table->string('CollectionTime')->nullable();
            $table->date('TestDate')->nullable();
            $table->string('Hemoglobin',1)->nullable();
            $table->float('HemoglobinResults')->nullable();
            $table->string('PeripheralSmear',1)->nullable();
            $table->float('PeripheralSmearResults')->nullable();
            $table->string('Syphillis',1)->nullable();
            $table->integer('SyphillisResults')->nullable();
            $table->integer('RPR')->nullable();
            $table->string('RPRTitreValue',100)->nullable();
            $table->string('BloodGlucose',1)->nullable();
            $table->float('BloodGlucoseResults')->nullable();
            $table->string('BloodSmear',1)->nullable();
            $table->integer('BloodSmearResults')->nullable();
            $table->integer('MRDTResult')->nullable();
            $table->integer('ParasitesSeen')->nullable();
            $table->integer('ParasiteQuantity')->nullable();
            $table->integer('BloodSmearParasiteSpecies')->nullable();
            $table->string('BloodSmearResultComments',100)->nullable();

			$table->string('UrineDipStick',1)->nullable();
            $table->integer('UrineColor')->nullable();
            $table->integer('UrineClarity')->nullable();
            $table->integer('UrineSpecificGravity')->nullable();
            $table->integer('UrinePH')->nullable();
            $table->integer('UrineNitrites')->nullable();
            $table->integer('UrineLeuk')->nullable();
            $table->integer('UrineProtein')->nullable();
            $table->integer('UrineGlucose')->nullable();
            $table->integer('UrineKetones')->nullable();
            $table->integer('UrineUrobil')->nullable();
            $table->integer('UrineBilirubin')->nullable();
            $table->integer('UrineBlood')->nullable();
            $table->integer('UrineLAMResult')->nullable();
            
            $table->float('UrineWBCs')->nullable();
            $table->float('UrineRBCs')->nullable();
            $table->float('UrineEpis')->nullable();
            $table->float('UrineCasts')->nullable();
            $table->string('UrineCrystals',100)->nullable();
            $table->string('UrineYeast',100)->nullable();
            $table->string('UrineOrg',100)->nullable();
            $table->integer('UrinePregnancy')->nullable();
        

            $table->string('StoolDirectExamination',1)->nullable();
            $table->string('StoolForm',100)->nullable();
            $table->string('StoolParasitesSeen',1)->nullable();
            $table->string('StoolParasiteSpecies',100)->nullable();
            $table->float('StoolWBCs')->nullable();
            $table->float('StoolYeast')->nullable();
            $table->integer('GramStainSource')->nullable();
            $table->string('GramStainNoOrganisms',1)->nullable();
            $table->integer('GramStainOrganismsSeen')->nullable();
            $table->string('GramStainOrganisms',100)->nullable();
          
            $table->string('AFBSmearLymph',1)->nullable();
            $table->string('AFBSmearSputum',1)->nullable();
            $table->string('znMicroscopy',1)->nullable();
            $table->integer('ResultznMicroscopy')->nullable();
            $table->integer('LevelznMicroscopy')->nullable();
            $table->string('FlourescenceMicroscopic',1)->nullable();
            $table->integer('ResultFlourescenceMicroscopy')->nullable();
            $table->integer('LevelFlourescenceMicroscopy')->nullable();
            $table->string('Sample1',1)->nullable();
            $table->string('Sample2',1)->nullable();
            $table->string('Sample3',1)->nullable();
            $table->integer('TBCultureDone')->nullable();
            $table->integer('TBCultureResult')->nullable();
            $table->integer('RifampicinSensitivityResult')->nullable();
            $table->integer('IsoniazidSensitivityResult')->nullable();
            $table->integer('PyrazinamideSensitivityResult')->nullable();
            $table->integer('EthambutolSensitivityResult')->nullable();
            $table->integer('StreptomycinSensitivityResult')->nullable();
			
            $table->integer('CragResult')->nullable();
            
            $table->integer('NeisseriaGonorrhoea')->nullable();
            $table->integer('ChlamydiaTrachomatis')->nullable();
            
            $table->biginteger('Patient')->nullable()->unsigned()->index();//FK
            $table->biginteger('TestedBy')->nullable()->unsigned()->index();//FK
            $table->biginteger('LabRequisition')->nullable()->unsigned()->index();//FK
            $table->biginteger('LabSampleCollection')->nullable()->unsigned()->index();//FK
            $table->biginteger('Encounter')->nullable()->unsigned()->index();//FK

            //foreign keys
            $table->foreign('Patient')->references('IDCNO')->on('patient')->onDelete('cascade');
            $table->foreign('TestedBy')->references('OID')->on('users')->onDelete('cascade');
            $table->foreign('LabRequisition')->references('OID')->on('LabRequisition')->onDelete('cascade');
            $table->foreign('LabSampleCollection')->references('OID')->on('LabSampleCollection')->onDelete('cascade');
            $table->foreign('Encounter')->references('OID')->on('encounter')->onDelete('cascade');
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
        Schema::dropIfExists('GeneralRequisitionResult');
    }
}
