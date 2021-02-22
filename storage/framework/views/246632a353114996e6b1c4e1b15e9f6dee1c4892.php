<style>
    * {box-sizing: border-box}

    /* Style the tab */
    .tab {
      float: left;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
      width: 40%;
      margin-top: 1px;
      /* height: 300px; */
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
      display: block;
      background-color: inherit;
      color: black;
      padding: 5px 16px;
      width: 100%;
      border: none;
      outline: none;
      text-align: left;
      cursor: pointer;
      transition: 0.3s;
      border-bottom: solid 0.5px #ccc;
      font-family: montserrat;
      font-size: 0.7em;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
      background-color: #ddd;
    }

    /* Create an active/current "tab button" class */
    .tab button.active {
      background-color: rgb(186, 209, 207);
	  background-color:#f7c743;

    }

    /* Style the tab content */
    .tabcontent {
      float: left;
      padding: 0px 12px;
      border: 1px solid #ccc;
      width: 100%;
      border-left: none;
      min-width: 450px;
     /*  height: 300px; */
    }
	@media (min-width: 576px){
		.tabcontent {
			min-width: 0;
		}
	}
		
    .modal-footer{
        border-top: 0;
    }
    label{
        margin-bottom: 0 !important;
    }
    #msform{
        width: 100% !important;
    }
</style>

<!-- sidebar -->
<div style="display:flex;">
    <div class="tab">
      <button class="tablinks" style="cursor: pointer" onclick="openDiv(event, 'triage')" id="defaultOpen">General and Triage</button>
      <button class="tablinks" onclick="openDiv(event, 'clinicalevents')">Clinical Events</button>
      <button class="tablinks" onclick="openDiv(event, 'carestatus')">Care Status</button>
      <button class="tablinks" onclick="openDiv(event, 'art')">Anti Retroviral Treatment</button>
      <button class="tablinks" onclick="openDiv(event, 'concurentmedication')">Concurrent Medications</button>
      <button class="tablinks" onclick="openDiv(event, 'concurentconditions')">Concurrent Medical Conditions</button>
    </div>

	<form id="msform" class="encounterform" autocomplete="off">
		<?php echo e(csrf_field()); ?>

		<!-- client information -->
		<?php $__currentLoopData = $flowsheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flowsheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div id="triage" class="tabcontent">
			<!-- client information -->
			<h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Visit Information</h2>
			<input type="hidden" name="encounterno" id="encounterno">
			<input type="hidden" name="age" id="age">
			<input type="hidden" name="flowsheetoid" id="flowsheetoid" value=<?php echo e($flowsheet->OID); ?>>
				<table class="prescription_table">
					<tr>
						<td>Client Number:</td><td> <input type="text" name="idcno" id="idcno" readonly></td>
					</tr>
					<tr>
						<td>Client Name:</td><td><input type="text" name="fullname" id="fullname" readonly></td>
					</tr>
					<tr>
						<td>Visit:</td><td><input type="text" name="visitdate" id="visitdate" readonly></td>
					</tr>
				</table>

				<!--  Clinical Information -->
				<h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Vital Signs</h2>
				<table class="prescription_table">
					<tr>
						<td>Systolic BP:</td><td> <input type="text" name="bphigh" id="bphigh" value="<?php echo e($flowsheet->BPHigh); ?>"></td>
					</tr>
					<tr>
						<td>Diastolic BP:</td><td><input type="text" name="bplow" id="bplow" value="<?php echo e($flowsheet->BPLow); ?>"></td>
					</tr>
					<tr>
						<td>Temperatue</td><td><input type="text" name="temperature" id="temperature" value="<?php echo e($flowsheet->Temperatue); ?>"></td>
					</tr>
					<tr>
						<td>Weight:</td><td><input type="text" name="weight" id="weight" value="<?php echo e($flowsheet->Weight); ?>"></td>
					</tr>
					<tr>
						<td>Height:</td><td><input type="number" name="height" id="height" min="10" value="<?php echo e($flowsheet->Height); ?>"></td>
					</tr>
					<tr>
						<td>MUAC:</td><td><input type="number" name="muac" id="muac" min="5" value="<?php echo e($flowsheet->MUAC); ?>"></td>
					</tr>

					<tr>
						<td>BMI:</td><td><input type="number" name="bmi" id="bmi" readonly style="color:#FFFFFF"></td>
					</tr>
					<tr>
						<td>WHO Stage:</td>
						<td style="padding-top:5px;">
							<select class="form-control" name="whostage" style="min-width:100px; max-width: 100px;">
								<option value="">---</option>
								<option value="1">I</option>
								<option value="2">II</option>
								<option value="3">III</option>
								<option value="4">IV</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Karnofsky Score:</td>
						<td style="padding-top:5px;">
							<select class="form-control" name="karnofkyscore" style="min-width:100px; max-width: 100px;">
								<option value="">---</option>
								<option value="100">100</option>
								<option value="90">90</option>
								<option value="80">80</option>
								<option value="70">70</option>
								<option value="60">60</option>
								<option value="50">50</option>
								<option value="40">40</option>
								<option value="30">30</option>
								<option value="20">20</option>
								<option value="10">10</option>
								<option value="0">0</option>
								<option value="unknown">unknown</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>CDC Score:</td>
						<td style="padding-top:5px;">
							<select class="form-control" name="cdcscore" style="min-width:100px; max-width: 100px;">
								<option value="">---</option>
								<option value="W">W</option>
								<option value="A">A</option>
								<option value="B">B</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>TB:</td>
						<td> 
							<input type="checkbox" name="tb" value="1" style="width:auto;"/>
						</td>
					</tr>
				</table>

				<h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">TB Intensified Case Form</h2>
				<table class="prescription_table">
					<tr>
						<td style="padding-bottom:10px;" colspan="2">If the patient has any of the following for 2 weeks , refer them to the  TB clinic!</td>
					</tr>
					<tr>
						<td>Coughing:</td>
						<td>
							<select class="form-control" name="coughing" >
								<option value="">---</option>
								<option value="1">Yes</option>
								<option value="2">No</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Blood Sputum:</td>
						<td>
							<select class="form-control" name="bloodsputum" >
								<option value="">---</option>
								<option value="1">Yes</option>
								<option value="2">No</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Persistent Fever</td>
						<td>
							<select class="form-control" name="persistentfever" >
								<option value="">---</option>
								<option value="1">Yes</option>
								<option value="2">No</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Weight Loss more than 3Kg:</td>
						<td>
							<select class="form-control" name="weightloss" >
								<option value="">---</option>
								<option value="1">Yes</option>
								<option value="2">No</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Night Sweats:</td>
						<td>
							<select class="form-control" name="nightsweats" >
								<option value="">---</option>
								<option value="1">Yes</option>
								<option value="2">No</option>
							</select>
						</td>
					</tr>
				</table>
			</div>

		<div id="clinicalevents" class="tabcontent">
			<?php echo $__env->make('patient::flowsheet.clinicalevents', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>

		<div id="carestatus" class="tabcontent">
			<?php echo $__env->make('patient::flowsheet.carestatus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>

		<div id="art" class="tabcontent">
			<?php echo $__env->make('patient::flowsheet.art', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>

		<div id="concurentmedication" class="tabcontent">
			<?php echo $__env->make('patient::flowsheet.concurrentmedications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>

		<div id="concurentconditions" class="tabcontent">
			<?php echo $__env->make('patient::flowsheet.concurrentconditions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
		
			
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</form>
</div>
<span class="triage error" style="display:none;"></span> 
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	<input type="button" name="updateflowsheet" class="action-button btn btn-primary" value="Save" id="updateflowsheet" />
</div>

<script type="text/javascript">
    //Triage information
        $(document).ready(function () {
            //BMI
                var weight = $('#weight').val();
                var height = $('#height').val();
                if(height!='' && weight!=''){
                    height = height/100; //convert height to metres
                    var bmi = bmi = weight/(height * height);
                    bmi = Math.round(bmi * 100) / 100;
                    var color;
                    if(bmi<16){
                        color='#ff0000';
                    }
                    if(bmi>=16 && bmi<18.5){
                        color='#ffff00';
                    }
                    if(bmi>=18.5 && bmi<25){
                        color='#00b050';
                    }
                    if(bmi>=25 && bmi<30){
                        color='#00b0f0';
                    }
                    if(bmi>=30){
                        color='#7030a0';
                    }
                    $('#bmi').val(bmi).css('background-color','').css('background-color',color).css('color','#FFFFFF');
                }
            //MUAC
                var muac = $('#muac').val();
                var age = parseInt($('#age').val());
                if(muac!=''){
                    var color='';
                    console.log(color)
                    if(isBetween(age,0.5,4.9)){
                        if(muac<11.5){color='#ff0000';}
                        if(muac>=11.5 && muac<12.5){color='#ffff00';}
                        if(muac>=12.5){color='#00b050';}
                    }
                    if(isBetween(age,15,18)){
                        if(muac<18.5){color='#ff0000';}
                        if(muac>=18.5 && muac<21){color='#ffff00';}
                        if(muac>=21){color='#00b050';}
                    }
                    if(isBetween(age,18,59)){
                        if(muac<19){color='#ff0000';}
                        if(muac>=19.0 && muac<22){color='#ffff00';}
                        if(muac>=22){color='#00b050';}
                    }
                    if(age>=60){
                        if(muac<16){color='#ff0000';}
                        if(muac>=16 && muac<18.5){color='#ffff00';}
                        if(muac>=18.5){color='#00b050';}
                    }
                    $('#muac').css('background-color','').css('background-color',color).css('color','#FFFFFF');
                }
            //BP
                var bphigh = $('#bphigh').val();
                var bplow = $('#bplow').val();
                if(bphigh!='' && bplow!=''){
                    var color;
                    if(bphigh<120 && bplow<80){
                        color='#a7cd39';
                    }
                    if(isBetween(bphigh,120,129) && bplow<80){
                        color='#f9e802';
                    }
                    if(isBetween(bphigh,130,139) || isBetween(bplow,80,89)){
                        color='#f3b610';
                    }
                    if(bphigh>=140 || bplow>=90){
                        color='#b94723';
                    }
                    // if(bphigh>=140 && bmi>=90){
                    //     color='#9a1b22';
                    // }
                    $('#bphigh,#bplow').css('background-color',color).css('color','#FFFFFF');
                }    

            $('select[name=coughing]').val('<?php echo e($flowsheet->Coughing); ?>');
            $('select[name=bloodsputum]').val('<?php echo e($flowsheet->BloodSputum); ?>');
            $('select[name=persistentfever]').val('<?php echo e($flowsheet->PersistentFever); ?>');
            $('select[name=weightloss]').val('<?php echo e($flowsheet->WeightLoss); ?>');
            $('select[name=nightsweats]').val('<?php echo e($flowsheet->NightSweats); ?>');
			$('select[name=whostage]').val('<?php echo e($flowsheet->WHOStage); ?>');
            $('select[name=karnofkyscore]').val('<?php echo e($flowsheet->Karnofskyscore); ?>');
            $('select[name=cdcscore]').val('<?php echo e($flowsheet->CDCScore); ?>');
			$('select[name=menstrualstatus]').val('<?php echo e($flowsheet->MenstrualStatus); ?>');
			$('input[name=lastmenstrualstart]').val('<?php echo e($flowsheet->StartLastMenstrual); ?>');
			
			$('input[name=inhstartdate]').val('<?php echo e($flowsheet->INHStart); ?>');
			$('input[name=inhenddate]').val('<?php echo e($flowsheet->IHNEnd); ?>');
			
			$('select[name=regimen]').val('<?php echo e($flowsheet->Regimen); ?>');
            $('select[name=dsdmtype]').val('<?php echo e($flowsheet->DSDMType); ?>');
			$('select[name=adherencescore]').val('<?php echo e($flowsheet->AdherenceScore); ?>');
			$('select[name=artsource]').val('<?php echo e($flowsheet->ARTSource); ?>');
			$('input[name=switchdate]').val('<?php echo e($flowsheet->SwitchDate); ?>');
			$('input[name=artstopdate]').val('<?php echo e($flowsheet->StopDate); ?>');
			$('input[name=otherartsource]').val('<?php echo e($flowsheet->OtherARTSource); ?>');
			
			$('select[name=hypertension]').val('<?php echo e($flowsheet->Hypertension); ?>');
            $('select[name=antihypertension]').val('<?php echo e($flowsheet->AntiHypertension); ?>');
			$('select[name=OtherHypertensionMedicine]').val('<?php echo e($flowsheet->OtherHypertensionMedicine); ?>');
            $('select[name=diabetesmellitus]').val('<?php echo e($flowsheet->Diabetes); ?>');
			$('select[name=antidiabetes]').val('<?php echo e($flowsheet->AntiDiabetes); ?>');
			$('select[name=otherdiameds]').val('<?php echo e($flowsheet->OtherDiabetesMedicine); ?>');
			$('select[name=cancer]').val('<?php echo e($flowsheet->Cancer); ?>');
            $('select[name=onchemo]').val('<?php echo e($flowsheet->Chemotherapy); ?>');
			$('select[name=oganmonitoring]').val('<?php echo e($flowsheet->OrganMonitoring); ?>');
            $('select[name=renaldisease]').val('<?php echo e($flowsheet->RenalDisease); ?>');
			$('select[name=urineprotein]').val('<?php echo e($flowsheet->UrineProtein); ?>');
			$('select[name=heartdisease]').val('<?php echo e($flowsheet->HeartDisease); ?>');
			$('input[name=cancertype]').val('<?php echo e($flowsheet->CancerType); ?>');
			$('input[name=chemotype]').val('<?php echo e($flowsheet->OtherChemotherapy); ?>');
			$('input[name=monitoredorgan]').val('<?php echo e($flowsheet->OrganMonitored); ?>');
			$('input[name=currentefgr]').val('<?php echo e($flowsheet->CurrenteGFR); ?>');
			$('select[name=ecg]').val('<?php echo e($flowsheet->ECG); ?>');
			$('select[name=heartecho]').val('<?php echo e($flowsheet->HeartECHO); ?>');
			$('input[name=ecgdate]').val('<?php echo e($flowsheet->ECGDate); ?>');
			$('input[name=echodate]').val('<?php echo e($flowsheet->ECHODate); ?>');
			
			$('select[name=dvt]').val('<?php echo e($flowsheet->DVT); ?>');
			$('select[name=asthma]').val('<?php echo e($flowsheet->Asthma); ?>');
			$('select[name=epilepsy]').val('<?php echo e($flowsheet->Epilepsy); ?>');
            $('select[name=mentalillness]').val('<?php echo e($flowsheet->MentalHealthIllness); ?>');
			$('select[name=hepatitisb]').val('<?php echo e($flowsheet->HepatitisB); ?>');
            $('select[name=disability]').val('<?php echo e($flowsheet->Disability); ?>');
			$('select[name=specifydisability]').val('<?php echo e($flowsheet->SpecifyDisability); ?>');
			$('input[name=otherdisability]').val('<?php echo e($flowsheet->OtherDiability); ?>');
			$('input[name=othermedicalcondition]').val('<?php echo e($flowsheet->OtherMedicalCondition); ?>');
			$('textarea[name=visitreasons]').val('<?php echo e($flowsheet->Comments); ?>');
			

			if($('select[name="hypertension"]').val()=='Yes'){
				$('select[name="antihypertension"]').prop("disabled", false);
				$('select[name="antihypertension"]').trigger("change");
			}
			if($('select[name="diabetesmellitus"]').val()=='Yes'){
				$('select[name="antidiabetes"]').prop("disabled", false);
				$('select[name="antidiabetes"]').trigger("change");
			}
			if($('select[name="cancer"]').val()=='Yes'){
				$('input[name="cancertype"]').prop("readonly", false);
			}
			if($('select[name="onchemo"]').val()=='Yes'){
				$('input[name="chemotype"]').prop("readonly", false);
			}
			if($('select[name="oganmonitoring"]').val()=='Yes'){
				$('input[name="monitoredorgan"]').prop("readonly", false);
			}
			if($('select[name="renaldisease"]').val()=='Yes'){
				$('input[name="currentefgr"]').prop("readonly", false);
			}
			if($('select[name="heartdisease"]').val()=='Yes'){
				$('select[name="ecg"],select[name="heartecho"]').prop("disabled", false);
				$('select[name="ecg"]').trigger("change");
				$('select[name="heartecho"]').trigger("change");
			}
			if($('select[name=disability]').val()=='Yes'){
				$('select[name="specifydisability"]').prop("disabled", false);
				$('select[name="specifydisability"]').trigger("change");
			}
			if($('select[name="artsource"]').val()=='other'){
				$('input[name="otherartsource"]').prop("readonly", false);
			}
	
			if('<?php echo e($flowsheet->DiabetesMedicine); ?>' !==null){
				let data = ('<?php echo e($flowsheet->DiabetesMedicine); ?>').split(',');
				for(let i=0;i<(data.length)-1;i++){
					$('input[value='+data[i]+']').prop('checked',true);
					if(data[i]=='Other'){
						$('input[name="otherdiameds"]').prop("readonly", false);
					}
				}
			}
			
			if('<?php echo e($flowsheet->HypertensionMedicine); ?>' !==null){
				let data = ('<?php echo e($flowsheet->HypertensionMedicine); ?>').split(',');
				for(let i=0;i<(data.length)-1;i++){
					$('input[value='+data[i]+']').prop('checked',true);
					if(data[i]=='Other'){
						$('input[name="otherhypermeds"]').prop("readonly", false);
					}
				}
			}
			
			
			if('<?php echo e($flowsheet->TB); ?>' !==null){
				$('input[name=tb]').prop('checked',true)
			}
			
			if('<?php echo e($flowsheet->OlsMalignancy); ?>' !==null){
				let data = ('<?php echo e($flowsheet->OlsMalignancy); ?>').split(',');
				for(let i=0;i<(data.length)-1;i++){
					$('input[value='+data[i]+']').prop('checked',true);
					if(data[i]=='O0'){
						$('input[name="ols_malignancy[]"]').prop("checked", false).prop('disabled',true);
						$('input[value='+data[i]+']').prop('disabled',false).prop("checked", true);
					}
				}
			}
			if('<?php echo e($flowsheet->OtherClinicalEvent); ?>' !==null){
				let data = ('<?php echo e($flowsheet->OtherClinicalEvent); ?>').split(',');
				for(let i=0;i<(data.length)-1;i++){
					$('input[value='+data[i]+']').prop('checked',true);
					if(data[i]=='E0'){
						$('input[name="otherclinicalevent[]"]').prop("checked", false).prop('disabled',true);
						$('input[value='+data[i]+']').prop('disabled',false).prop("checked", true);
					}
				}
				
			}
			
			if('<?php echo e($flowsheet->ContraceptiveMethod); ?>' !==null){
				let data = ('<?php echo e($flowsheet->ContraceptiveMethod); ?>').split(',');
				for(let i=0;i<(data.length)-1;i++){
					$('input[value='+data[i]+']').prop('checked',true);
					if(data[i]=='CM0'){
						$('input[name="contraceptive_method[]"]').prop("checked", false).prop('disabled',true);
						$('input[value='+data[i]+']').prop('disabled',false).prop("checked", true);
					}
				}
				
			}
			
			if('<?php echo e($flowsheet->STIScreeningSymptom); ?>' !==null){
				let data = ('<?php echo e($flowsheet->STIScreeningSymptom); ?>').split(',');
				for(let i=0;i<(data.length)-1;i++){
					$('input[value='+data[i]+']').prop('checked',true);
					if(data[i]=='SS0'){
						$('input[name="screeningsymptom[]"]').prop("checked", false).prop('disabled',true);
						$('input[value='+data[i]+']').prop('disabled',false).prop("checked", true);
					}
				}
				
			}
			
			if('<?php echo e($flowsheet->Prophylaxis); ?>' !==null){
				let data = ('<?php echo e($flowsheet->Prophylaxis); ?>').split(',');
				for(let i=0;i<(data.length)-1;i++){
					$('input[value='+data[i]+']').prop('checked',true);
					if(data[i]=='P0'){
						$('input[name="prophylaxis[]"]').prop("checked", false).prop('disabled',true);
						$('input[value='+data[i]+']').prop('disabled',false).prop("checked", true);
					}
				}
				
			}
			
			if('<?php echo e($flowsheet->ART); ?>' !==null){
				$('input[name=ART]').prop('checked',true)
			}
			if('<?php echo e($flowsheet->NotStrartARVReason); ?>' !==null){
				let data = ('<?php echo e($flowsheet->NotStrartARVReason); ?>').split(',');
				for(let i=0;i<(data.length)-1;i++){
					$('input[value='+data[i]+']').prop('checked',true);
					if(data[i]=='N0'){
						$('input[name="nostartARVreason[]"]').prop("checked", false).prop('disabled',true);
						$('input[value='+data[i]+']').prop('disabled',false).prop("checked", true);
					}
				}
				
			}
			
			if('<?php echo e($flowsheet->Toxicity); ?>' !==null){
				let data = ('<?php echo e($flowsheet->Toxicity); ?>').split(',');
				for(let i=0;i<(data.length)-1;i++){
					$('input[value='+data[i]+']').prop('checked',true);
					if(data[i]=='T0'){
						$('input[name="toxicity[]"]').prop("checked", false).prop('disabled',true);
						$('input[value='+data[i]+']').prop('disabled',false).prop("checked", true);
					}
				}
				
			}
			
			if('<?php echo e($flowsheet->SwitchReason); ?>' !==null){
				let data = ('<?php echo e($flowsheet->SwitchReason); ?>').split(',');
				for(let i=0;i<(data.length)-1;i++){
					$('input[value='+data[i]+']').prop('checked',true);
					if(data[i]=='C0'){
						$('input[name="switchreason[]"]').prop("checked", false).prop('disabled',true);
						$('input[value='+data[i]+']').prop('disabled',false).prop("checked", true);
						$('input[name="switchdate"]').prop("readonly", true).val('');
					}
				}
				
			}
			
			if('<?php echo e($flowsheet->StopReason); ?>' !==null){
				let data = ('<?php echo e($flowsheet->StopReason); ?>').split(',');
				for(let i=0;i<(data.length)-1;i++){
					$('input[value='+data[i]+']').prop('checked',true);
					if(data[i]=='ST0'){
						$('input[name="artstopreason[]"]').prop("checked", false).prop('disabled',true);
						$('input[value='+data[i]+']').prop('disabled',false).prop("checked", true);
					}
				}
				
			}
			
            $('#updateflowsheet').on('click', function(e){
                e.preventDefault();
                var form = new FormData(document.getElementById('msform'));
                $.ajax({
                    type: 'post',
                    url: '<?php echo e(route("updateflowsheet")); ?>',
                    data: form,
                    processData: false,
                    contentType: false,
                    success: function(data)
                    {
                        if(data.error){
                            $('.triage.error').html('');
                            for(var i=0;i<data.error.length;i++){
                                $('.triage.error').append(data.error[i]+' | ');
                            }
                            $(".triage.error").css("display", "block");
                            return;
                        }
                        $('#mymodal2').modal('hide');
                        toastr.success("Flowsheet Detail Updated");
                        $("#labtablebody").load('<?php echo e(route("flowsheets",["idcno"=>""])); ?>'+$('#fidcno').val()+ ' #labtablebody');
                        $('#mymodal2').on('hidden.bs.modal', function () {
                        });

                        $.ajax({
                            type: 'get',
                            url: '<?php echo e(route("gettriagedetail")); ?>',
                            data: {'encounterid':$('#encounterno').val(), 'idcno':$('#idcno').val(),},
                            success: function(data)
                            {   
                                //clear detail
                                $('#hometemp').text('');
                                $('#bp').text('');
                                $('#homeweight').text('');
                                $('#triagedate').text('');
                                $('#homeheight').text('');
                                $('#homemuac').text('');
                                $('#homebmi').text('').css('background-color','');

                                if(jQuery.isEmptyObject(data) == true){
                                    $('#hometemp').text('');
                                    $('#bp').text('');
                                    $('#homeweight').text('');
                                    $('#triagedate').text('');
                                    $('#homeheight').text('');
                                    $('#homebmi').text('').css('background-color','');

                                    toastr.info("Encounter has no Triage Detail");

                                }
                                else{
                                    $('#triagedate').text(data.TriageDate)
                                    $('#bp').text(data.BPHigh +"/"+data.BPLow).append(" mmHg");
                                    $('#hometemp').text(data.Temperatue).append(" <sup>0</sup>C");
                                    $('#homeweight').text(data.Weight+" Kg");
                                    $('#homeheight').text(data.Height+" cm");
                                    $('#homemuac').text(data.MUAC+" cm");

                                    //calculate BMI
                                    var weight = data.Weight;
                                    var height = data.Height;
                                    height = height/100; //convert height to metres
                                    var bmi = bmi = weight/(height * height);
                                    bmi = Math.round(bmi * 100) / 100;

                                    var color;
                                    if(bmi<16){
                                    color='#ff0000';
                                    }
                                    if(bmi>=16 && bmi<18.5){
                                        color='#ffff00';
                                    }
                                    if(bmi>=18.5 && bmi<25){
                                        color='#00b050';
                                    }
                                    if(bmi>=25 && bmi<30){
                                        color='#00b0f0';
                                    }
                                    if(bmi>=30){
                                        color='#7030a0';
                                    }

                                    $('#homebmi').text(bmi+" kg/m").append(" <sup>2</sup>").css({'background-color':color});

                                }  
                            },
                            error: function(){
               
                            },
                        });

                    },
                    error: function(){
                        toastr.error("Something Went Wrong");
                        console.log('Error');   
                    },
                });
                return;
            });

            $('#weight, #height').on('keyup change',function(){
                var weight = $('#weight').val();
                var height = $('#height').val();
                if(height!='' && weight!=''){
                    height = height/100; //convert height to metres
                    var bmi = bmi = weight/(height * height);
                    bmi = Math.round(bmi * 100) / 100;
                    var color;
                    if(bmi<16){
                        color='#ff0000';
                    }
                    if(bmi>=16 && bmi<18.5){
                        color='#ffff00';
                    }
                    if(bmi>=18.5 && bmi<25){
                        color='#00b050';
                    }
                    if(bmi>=25 && bmi<30){
                        color='#00b0f0';
                    }
                    if(bmi>=30){
                        color='#7030a0';
                    }
                    $('#bmi').val(bmi).css('background-color','').css('background-color',color);
                }
            });

            $('#muac').on('keyup change',function(){
                var muac = $('#muac').val();
                console.log(muac)
                var age = parseInt($('#age').val());
                if(muac!=''){
                    var color='';
                    console.log(color)
                    if(isBetween(age,0.5,4.9)){
                        if(muac<11.5){color='#ff0000';}
                        if(muac>=11.5 && muac<12.5){color='#ffff00';}
                        if(muac>=12.5){color='#00b050';}
                    }
                    if(isBetween(age,15,18)){
                        if(muac<18.5){color='#ff0000';}
                        if(muac>=18.5 && muac<21){color='#ffff00';}
                        if(muac>=21){color='#00b050';}
                    }
                    if(isBetween(age,18,59)){
                        if(muac<19){color='#ff0000';}
                        if(muac>=19.0 && muac<22){color='#ffff00';}
                        if(muac>=22){color='#00b050';}
                    }
                    if(age>=60){
                        if(muac<16){color='#ff0000';}
                        if(muac>=16 && muac<18.5){color='#ffff00';}
                        if(muac>=18.5){color='#00b050';}
                    }
                    $('#muac').css('background-color','').css('background-color',color);
                }
            });

            $('#bphigh,#bplow').on('keyup change',function(){
                var bphigh = $('#bphigh').val();
                var bplow = $('#bplow').val();
                if(bphigh!='' && bplow!=''){
                    var color;
                    if(bphigh<120 && bplow<80){
                        color='#a7cd39';
                    }
                    if(isBetween(bphigh,120,129) && bplow<80){
                        color='#f9e802';
                    }
                    if(isBetween(bphigh,130,139) || isBetween(bplow,80,89)){
                        color='#f3b610';
                    }
                    if(bphigh>=140 && bmi>=90){
                        color='#b94723';
                    }
                    // if(bphigh>=140 && bmi>=90){
                    //     color='#9a1b22';
                    // }
                    $('#bphigh,#bplow').css('background-color',color);
                }    
            });
        });

    function isBetween(n, a, b) {
       return (n - a) * (n - b) <= 0
    }
	
	function openDiv(evt, divId) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the link that opened the tab
        document.getElementById(divId).style.display = "block";
        evt.currentTarget.className += " active";
    }
    document.getElementById("defaultOpen").click();
</script><?php /**PATH C:\xampp\htdocs\OpenICEA\modules/Patient\Resources/views/flowsheet/editflowsheet.blade.php ENDPATH**/ ?>