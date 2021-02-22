<h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Concurrent Medications</h2>
<table class="prescription_table">
	<tr>
        <td>Hypertension:</td>
        <td style="padding-top:5px;">
			<select class="form-control" name="hypertension" style="min-width:100px; max-width: 100px;">
                <option value="">---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
		</td>
		<td>On Anti Hypertension:</td>
        <td style="padding-top:5px;">
			<select class="form-control" name="antihypertension" style="min-width:100px; max-width: 100px;" disabled>
                <option value="">---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
		</td>
    </tr>
	
	<tr>
        <td rowspan='5'>If yes, Medicine:</td>
    </tr>
    <tr>
        <td colspan="3"> 
        	<label for="nifedipine" style="cursor: pointer;">Nifedipine</label>
        	<input type="checkbox" name="hypermeds[]" id="nifedipine" value="Nifedipine" style="width:auto; margin-right:5px;" disabled/>
    	</td>
    </tr>
    <tr>
        <td colspan="3"> 
        	<label for="beta_blockers" style="cursor: pointer;">Beta_Blockers</label>
        	<input type="checkbox" name="hypermeds[]" id="beta_blockers" value="Beta_Blockers" style="width:auto; margin-right:5px;" disabled/>
    	</td>
    </tr>
    <tr>
        <td colspan="3"> 
        	<label for="bendroflumethiazide" style="cursor: pointer;">Bendroflumethiazide</label>
        	<input type="checkbox" name="hypermeds[]" id="bendroflumethiazide" value="Bendroflumethiazide" style="width:auto; margin-right:5px;" disabled/>
    	</td>
    </tr>
    <tr>
        <td colspan="3"> 
        	<label for="otherhypermedicine" style="cursor: pointer;">Other</label>
        	<input type="checkbox" name="hypermeds[]" id="otherhypermedicine" value="Other" style="width:auto; margin-right:5px;" disabled/>
    	</td>
    </tr>
	<tr>
        <td>Other Hypertension Medicine:</td>
		<td colspan="3"> 
        	<input type="text" name="otherhypermeds" readonly/>
    	</td>
    </tr>
    <tr style="background-color:#ccc;height:3px;"><td colspan="4"></td></tr>
		
	<tr>
        <td>Diabetes Mellitus:</td>
        <td style="padding-top:5px;">
			<select class="form-control" name="diabetesmellitus" style="min-width:100px; max-width: 100px;">
                <option value="">---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
		</td>
		<td>On Antidiabetes:</td>
        <td style="padding-top:5px;">
			<select class="form-control" name="antidiabetes" style="min-width:100px; max-width: 100px;" disabled>
                <option value="">---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
		</td>
    </tr>
	
	<tr>
        <td rowspan='5'>If yes, Medicine:</td>
    </tr>
    <tr>
        <td colspan="3"> 
        	<label for="insulin" style="cursor: pointer;">Insulin</label>
        	<input type="checkbox" name="diameds[]" id="insulin" value="Insulin" style="width:auto; margin-right:5px;" disabled/>
    	</td>
    </tr>
    <tr>
        <td colspan="3"> 
        	<label for="metformine" style="cursor: pointer;">Metformine</label>
        	<input type="checkbox" name="diameds[]" id="metformine" value="Metformine" style="width:auto; margin-right:5px;" disabled/>
    	</td>
    </tr>
    <tr>
        <td colspan="3"> 
        	<label for="glibenclamide" style="cursor: pointer;">Glibenclamide</label>
        	<input type="checkbox" name="diameds[]" id="glibenclamide" value="Glibenclamide" style="width:auto; margin-right:5px;" disabled/>
    	</td>
    </tr>
    <tr>
        <td colspan="3"> 
        	<label for="otherdiamedicine" style="cursor: pointer;">Other</label>
        	<input type="checkbox" name="diameds[]" id="otherdiamedicine" value="Other" style="width:auto; margin-right:5px;" disabled/>
    	</td>
    </tr>
	<tr>
        <td>Other Diabetes Medicine:</td>
		<td colspan="3"> 
        	<input type="text" name="otherdiameds" readonly/>
    	</td>
    </tr>
    <tr style="background-color:#ccc;height:3px;"><td colspan="4"></td></tr>
	
	
	
	<tr>
        <td>Cancer:</td>
        <td style="padding-top:5px;">
			<select class="form-control" name="cancer" style="min-width:100px; max-width: 100px;">
                <option value="">---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
		</td>
		<td>Type of Cancer:</td>
        <td style="padding-top:5px;">
			<input type="text" name="cancertype" readonly>
		</td>
    </tr>
	<tr>
        <td>On Chemotherapy:</td>
        <td style="padding-top:5px;">
			<select class="form-control" name="onchemo" style="min-width:100px; max-width: 100px;">
                <option value="">---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
		</td>
		<td>Other Specify:</td>
        <td style="padding-top:5px;">
			<input type="text" name="chemotype" readonly>
		</td>
    </tr>
	<tr>
        <td>Monitoring for which organ:</td>
        <td style="padding-top:5px;">
			<select class="form-control" name="oganmonitoring" style="min-width:100px; max-width: 100px;">
                <option value="">---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
		</td>
		<td>Which Organ:</td>
        <td style="padding-top:5px;">
			<input type="text" name="monitoredorgan" readonly>
		</td>
    </tr>
	<tr>
        <td>Renal Disease:</td>
        <td style="padding-top:5px;">
			<select class="form-control" name="renaldisease" style="min-width:100px; max-width: 100px;">
                <option value="">---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
		</td>
		<td>Current eGFR:</td>
        <td style="padding-top:5px;">
			<input type="text" name="currentefgr" readonly>
		</td>
    </tr>
	<tr>
        <td>Urine Protein</td>
        <td style="padding-top:5px;" colspan="3">
			<select class="form-control" name="urineprotein" style="min-width:100px; max-width: 100px;">
                <option value="">---</option>
                <option value="1">Yes</option>
                <option value="2">No</option>
            </select>
		</td>
    </tr>
	<tr>
        <td>Heart Disease:</td>
        <td style="padding-top:5px;">
			<select class="form-control" name="heartdisease" style="min-width:100px; max-width: 100px;">
                <option value="">---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
		</td>
		<td>ECG:</td>
        <td style="padding-top:5px;">
			<select class="form-control" name="ecg" style="min-width:100px; max-width: 100px;" disabled>
                <option value="">---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
		</td>
    </tr>
	<tr>
        <td>ECG Date:</td>
        <td style="padding-top:5px;">
			<input type="date" name="ecgdate" style="font-size: 10px;width: 80%;" readonly/>
		</td>
		<td>ECHO:</td>
        <td style="padding-top:5px;">
			<select class="form-control" name="heartecho" style="min-width:100px; max-width: 100px;" disabled>
                <option value="">---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
		</td>
    </tr>
	<tr>
        <td>ECHO Date</td>
        <td style="padding-top:5px;" >
			<input type="date" name="echodate" style="font-size: 10px;width: 80%;" readonly/>
		</td>
    </tr>	
</table>

<script>
$(document).ready(function(){
//for editing Logic
});

//hypertension logic
	$('select[name="hypertension"]').on('change', function(e){
		$('select[name="antihypertension"]').prop("disabled", true).val('');
		$('select[name="antihypertension"]').trigger("change");
		if($(this).val()=='Yes'){
			$('select[name="antihypertension"]').prop("disabled", false);
		}
	});
	
	$('select[name="antihypertension"]').on('change', function(e){
		$('input[name="hypermeds[]"]').prop('disabled',false);
		$('input[name="hypermeds[]"]').trigger("change");
		if($(this).val()!='Yes'){
			$('input[name="hypermeds[]"]').prop("checked", false).prop("disabled", true);
		}
		
	});
	
	$('input[name="hypermeds[]"]').on('change', function(e){
		$('input[name="otherhypermeds"]').prop('readonly',true).val('');
		if($(this).val()=='Other' && $(this).prop('checked')){
			$('input[name="otherhypermeds"]').prop("readonly", false);
		}	
	});

//Diabetes logic
	$('select[name="diabetesmellitus"]').on('change', function(e){
		$('select[name="antidiabetes"]').prop("disabled", true).val('');
		$('select[name="antidiabetes"]').trigger("change");
		if($(this).val()=='Yes'){
			$('select[name="antidiabetes"]').prop("disabled", false);
		}
	});
	
	$('select[name="antidiabetes"]').on('change', function(e){
		$('input[name="diameds[]"]').prop('disabled',false);
		$('input[name="diameds[]"]').trigger("change");
		if($(this).val()!='Yes'){
			$('input[name="diameds[]"]').prop("checked", false).prop("disabled", true);
		}
		
	});
	
	$('input[name="diameds[]"]').on('change', function(e){
		$('input[name="otherdiameds"]').prop('readonly',true).val('');
		if($(this).val()=='Other' && $(this).prop('checked')){
			$('input[name="otherdiameds"]').prop("readonly", false);
		}	
	});

//cancer
	$('select[name="cancer"]').on('change', function(e){
		$('input[name="cancertype"]').prop('readonly',false);
		if($(this).val()!='Yes'){
			$('input[name="cancertype"]').prop("readonly", true).val('');
		}	
	});
//Chemotherapy
	$('select[name="onchemo"]').on('change', function(e){
		$('input[name="chemotype"]').prop('readonly',false);
		if($(this).val()!='Yes'){
			$('input[name="chemotype"]').prop("readonly", true).val('');
		}
			
	});
	
//Monitoring
	$('select[name="oganmonitoring"]').on('change', function(e){
		$('input[name="monitoredorgan"]').prop('readonly',false);
		if($(this).val()!='Yes'){
			$('input[name="monitoredorgan"]').prop("readonly", true).val('');
		}
			
	});
//Renal disease
	$('select[name="renaldisease"]').on('change', function(e){
		$('input[name="currentefgr"]').prop('readonly',false);
		if($(this).val()!='Yes'){
			$('input[name="currentefgr"]').prop("readonly", true).val('');
		}
			
	});
	
//heart disease
	$('select[name="heartdisease"]').on('change', function(e){
		$('select[name="ecg"],select[name="heartecho"]').prop('disabled',false);
		if($(this).val()!='Yes'){
			$('select[name="ecg"],select[name="heartecho"]').prop("disabled", true).val('');
			$('select[name="ecg"]').trigger("change");
			$('select[name="heartecho"]').trigger("change");
		}
			
	});
	
	$('select[name="ecg"]').on('change', function(e){
		$('input[name="ecgdate"]').prop('readonly',false);
		if($(this).val()!='Yes'){
			$('input[name="ecgdate"]').prop("readonly", true).val('');
		}
			
	});
	
	$('select[name="heartecho"]').on('change', function(e){
		$('input[name="echodate"]').prop('readonly',false);
		if($(this).val()!='Yes'){
			$('input[name="echodate"]').prop("readonly", true).val('');
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
	$('input[name="echodate"],input[name="ecgdate"]').prop('max',[year, month, day].join('-'));

	</script>
