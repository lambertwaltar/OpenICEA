<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlowheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flowsheet', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);
            $table->date('TriageDate')->nullable();
            $table->string('Reasons', 200)->nullable();
            $table->biginteger('Patient')->nullable()->unsigned()->index();//FK
            $table->biginteger('Provider')->nullable()->unsigned()->index();//FK
            $table->biginteger('Encounter')->nullable()->unsigned()->index();//FK
			
			//General Triage
				$table->float('BPHigh')->nullable();
				$table->float('BPLow')->nullable();
				$table->float('Temperatue')->nullable();
				$table->float('Weight')->nullable();
				$table->float('Height')->nullable();
				$table->float('MUAC')->nullable();
				$table->string('WHOStage', 10)->nullable();
				$table->string('Karnofskyscore', 100)->nullable();
				$table->string('CDCScore', 1)->nullable();
				$table->string('TB', 1)->nullable();
				$table->string('Coughing', 1)->nullable();
				$table->string('BloodSputum', 1)->nullable();
				$table->string('PersistentFever', 1)->nullable();
				$table->string('WeightLoss', 1)->nullable();
				$table->string('NightSweats', 1)->nullable();
			//Clinical Events
				$table->string('OlsMalignancy', 200)->nullable();
				$table->string('OtherClinicalEvent', 200)->nullable();
				$table->string('MenstrualStatus', 1)->nullable();
				$table->date('StartLastMenstrual')->nullable();
				$table->string('ContraceptiveMethod', 200)->nullable();
				$table->string('STIScreeningSymptom', 200)->nullable();
			//Care Status
				$table->string('Prophylaxis', 200)->nullable();
				$table->date('INHStart')->nullable();
				$table->date('IHNEnd')->nullable();
				$table->string('ART', 1)->nullable();
				$table->string('NotStrartARVReason', 200)->nullable();
			//ART
				$table->biginteger('Regimen')->nullable()->unsigned()->index();//FK
				$table->biginteger('DSDMType')->nullable()->unsigned()->index();//FK
				$table->string('AdherenceScore', 50)->nullable();
				$table->string('Toxicity', 200)->nullable();
				$table->string('SwitchReason', 200)->nullable();
				$table->date('SwitchDate')->nullable();
				$table->string('StopReason', 200)->nullable();
				$table->date('StopDate')->nullable();
				$table->biginteger('ARTSource')->nullable()->unsigned()->index(); //FK
				$table->string('OtherARTSource', 200)->nullable();
			//Concurrent Medications
				$table->string('Hypertension', 200)->nullable();
				$table->string('AntiHypertension', 200)->nullable();
				$table->string('HypertensionMedicine', 200)->nullable();
				$table->string('OtherHypertensionMedicine', 200)->nullable();
				$table->string('Diabetes', 200)->nullable();
				$table->string('AntiDiabetes', 200)->nullable();
				$table->string('DiabetesMedicine', 200)->nullable();
				$table->string('OtherDiabetesMedicine', 200)->nullable();
				$table->string('Cancer', 200)->nullable();
				$table->string('CancerType', 200)->nullable();
				$table->string('Chemotherapy', 200)->nullable();
				$table->string('OtherChemotherapy', 200)->nullable();
				$table->string('OrganMonitoring', 200)->nullable();
				$table->string('OrganMonitored', 200)->nullable();
				$table->string('RenalDisease', 200)->nullable();
				$table->string('CurrenteGFR', 200)->nullable();
				$table->string('UrineProtein', 200)->nullable();
				$table->string('HeartDisease', 200)->nullable();
				$table->string('ECG', 200)->nullable();
				$table->string('HeartECHO', 200)->nullable();
				$table->date('ECGDate')->nullable();
				$table->date('ECHODate')->nullable();
			//Concurrent Conditions
				$table->string('DVT', 200)->nullable();
				$table->string('Asthma', 200)->nullable();
				$table->string('Epilepsy', 200)->nullable();
				$table->string('MentalHealthIllness', 200)->nullable();
				$table->string('HepatitisB', 200)->nullable();
				$table->string('Disability', 200)->nullable();
				$table->string('SpecifyDisability', 200)->nullable();
				$table->string('OtherDiability', 200)->nullable();
				$table->string('OtherMedicalCondition', 200)->nullable();
				$table->string('Comments', 200)->nullable();

            //foreign keys
            $table->foreign('Patient')->references('IDCNO')->on('patient')->onDelete('cascade');
            $table->foreign('Provider')->references('OID')->on('users')->onDelete('cascade');
            $table->foreign('Encounter')->references('OID')->on('encounter')->onDelete('cascade');
			$table->foreign('Regimen')->references('OID')->on('regimen')->onDelete('cascade');
			$table->foreign('DSDMType')->references('OID')->on('DSDMType')->onDelete('cascade');
			$table->foreign('ARTSource')->references('OID')->on('FundingSource')->onDelete('cascade');

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
        Schema::dropIfExists('flowheet');
    }
}
