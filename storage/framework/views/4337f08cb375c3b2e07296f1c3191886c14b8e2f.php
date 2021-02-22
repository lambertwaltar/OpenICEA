
<h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Anti Retroviral Treatment</h2>
<table class="prescription_table">
	
	<tr>
        <td>Regimen:</td>
        <td>
			<select class="form-control" name="regimen" style="min-width:100px; max-width: 100px;">
                <option value="">---</option>
                <?php $__currentLoopData = $regimen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $regim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($regim->OID); ?>"><?php echo e($regim->Code); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
		</td>
    </tr>
	<tr>
        <td>DSDM Type:</td>
        <td>
			<select class="form-control" name="dsdmtype" style="min-width:100px; max-width: 100px;">
                <option value="">---</option>
				<?php $__currentLoopData = $dsdmtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsdm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($dsdm->OID); ?>"><?php echo e($dsdm->Description); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
		</td>
    </tr>
	<tr>
        <td>Adherence Score:</td>
        <td>
			<select class="form-control" name="adherencescore" style="min-width:100px; max-width: 100px;">
                <option value="">---</option>
                <option value="100">100</option>
                <option value="99">99</option>
				<option value="98">98</option>
                <option value="97">97</option>
				<option value="96">96</option>
                <option value="95">95</option>
				<option value="94">94</option>
                <option value="93">93</option>
				<option value="92">92</option>
                <option value="91">91</option>
				<option value="90">90</option>
                <option value="85">85</option>
				<option value="80">80</option>
                <option value="70">70</option>
				<option value="60">60</option>
                <option value="50">50</option>
				<option value="40">40</option>
                <option value="30">30</option>
				<option value="20">20</option>
				<option value="10">10</option>
				<option value="0">0</option>
            </select>
		</td>
    </tr>

	<tr>
        <td rowspan='6'>toxicity:</td>
    </tr>
    <tr>
        <td> 
        	<label for="tnone" style="cursor: pointer;">T0: None</label>
        	<input type="checkbox" name="toxicity[]" id="tnone" value="T0" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="peripheralneuritis" style="cursor: pointer;">T1: Peripheral neuritis</label>
        	<input type="checkbox" name="toxicity[]" id="peripheralneuritis" value="T1" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="anaemia" style="cursor: pointer;">T2: Anaemia</label>
        	<input type="checkbox" name="toxicity[]" id="anaemia" value="T2" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="neutropaenia" style="cursor: pointer;">T3: Neutropaenia</label>
        	<input type="checkbox" name="toxicity[]" id="neutropaenia" value="T3" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="trash" style="cursor: pointer;">T4: Rash</label>
        	<input type="checkbox" name="toxicity[]" id="trash" value="T4" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr style="background-color:#ccc;height:3px;"><td></td><td></td></tr>
	
    <tr>
        <td rowspan='6'>Switch Reason:</td>
    </tr>
    <tr>
        <td style="padding-top: 10px;"> 
        	<label for="cnone" style="cursor: pointer;">C0: None</label>
        	<input type="checkbox" name="switchreason[]" id="cnone" value="C0" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="toxicity_complications" style="cursor: pointer;">C1: toxicity/COmplications</label>
        	<input type="checkbox" name="switchreason[]" id="toxicity_complications" value="C1" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="intolerance" style="cursor: pointer;">C2: Intolerance</label>
        	<input type="checkbox" name="switchreason[]" id="intolerance" value="C2" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="ctfailure" style="cursor: pointer;">C3: Clinical Treatment Failure</label>
        	<input type="checkbox" name="switchreason[]" id="ctfailure" value="C3" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="immunologicfailure" style="cursor: pointer;">C4: Immunologic Failure</label>
        	<input type="checkbox" name="switchreason[]" id="immunologicfailure" value="C4" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
	<tr>
        <td>Switch Date:</td>
		<td> 
        	<input type="date" name="switchdate"/>
    	</td>
    </tr>
    <tr style="background-color:#ccc;height:3px;"><td></td><td></td></tr>
	
	<tr>
        <td rowspan='6'>Stop Reason:</td>
    </tr>
    <tr>
        <td style="padding-top: 10px;"> 
        	<label for="artstopnone" style="cursor: pointer;">ST0: None</label>
        	<input type="checkbox" name="artstopreason[]" id="artstopnone" value="ST0" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="artsoptoxicity[]_complications" style="cursor: pointer;">ST1: toxicity[]/COmplications</label>
        	<input type="checkbox" name="artstopreason[]" id="artsoptoxicity[]_complications" value="ST1" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="financialincapacity" style="cursor: pointer;">ST2: Lacking financial resources</label>
        	<input type="checkbox" name="artstopreason[]" id="financialincapacity" value="ST2" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="illness_hospitalization" style="cursor: pointer;">ST3: Illness/Hospitalization</label>
        	<input type="checkbox" name="artstopreason[]" id="illness_hospitalization" value="ST3" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="newTB" style="cursor: pointer;">ST4: Due to new TB</label>
        	<input type="checkbox" name="artstopreason[]" id="newTB" value="ST4" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
	<tr>
        <td>Stop Date:</td>
		<td> 
        	<input type="date" name="artstopdate"/>
    	</td>
    </tr>
	<tr>
        <td>ART Source:</td>
        <td>
			<select class="form-control" name="artsource" style="min-width:100px; max-width: 100px;">
                <option value="">---</option>
				<?php $__currentLoopData = $fundingsources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fundingsource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($fundingsource->OID); ?>"><?php echo e($fundingsource->Code.' - '.$fundingsource->Name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<option value="other">other</option>
            </select>
		</td>
    </tr>
	<tr>
        <td>Other ART Source:</td>
        <td>
			<input type="text" name="otherartsource" readonly>
		</td>
    </tr>
	
</table>

<script>
$(document).ready(function () {   
//None Logic
	$('input[name="toxicity[]"]').on('change', function(e){
		$('input[name="toxicity[]"]').prop('disabled',false);
		if($(this).val()=='T0' && $(this).prop('checked')){
			$('input[name="toxicity[]"]').prop("checked", false).prop('disabled',true);
			$(this).prop('disabled',false).prop("checked", true);
		}	
	});
	
	$('input[name="switchreason[]"]').on('change', function(e){
		$('input[name="switchreason[]"]').prop('disabled',false);
		$('input[name="switchdate"]').prop("readonly", false);
		if($(this).val()=='C0' && $(this).prop('checked')){
			$('input[name="switchreason[]"]').prop("checked", false).prop('disabled',true);
			$(this).prop('disabled',false).prop("checked", true);
			$('input[name="switchdate"]').prop("readonly", true).val('');
		}	
	});
	
	$('input[name="artstopreason[]"]').on('change', function(e){
		$('input[name="artstopreason[]"]').prop('disabled',false);
		$('input[name="artstopdate"]').prop("readonly", false);
		if($(this).val()=='ST0' && $(this).prop('checked')){
			$('input[name="artstopreason[]"]').prop("checked", false).prop('disabled',true);
			$(this).prop('disabled',false).prop("checked", true);
			$('input[name="artstopdate"]').prop("readonly", true).val('');
		}	
	});
//other
	$('select[name="artsource"]').on('change', function(e){
		$('input[name="otherartsource"]').prop("readonly", true);
		if($(this).val()=='other'){
			$('input[name="otherartsource"]').prop("readonly", false);
		}	
	});
	
//date logic
	var fullDate = new Date(),
	month = '' + (fullDate.getMonth() + 1),
	day = '' + fullDate.getDate(),
	year = fullDate.getFullYear();

	if (month.length < 2) 
		month = '0' + month;
	if (day.length < 2) 
		day = '0' + day;
	$('input[name="artstopdate"],input[name="switchdate"]').prop('max',[year, month, day].join('-'));

});	
</script><?php /**PATH C:\xampp\htdocs\OpenICEA\modules/Patient\Resources/views/flowsheet/art.blade.php ENDPATH**/ ?>