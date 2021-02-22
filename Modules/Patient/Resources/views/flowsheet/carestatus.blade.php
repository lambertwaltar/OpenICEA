<h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Care Status</h2>
<table class="prescription_table">
<!-- prophylaxis[] -->
    <tr>
        <td rowspan='7'>prophylaxis:</td>
    </tr>
    <tr>
        <td> 
        	<label for="pnone" style="cursor: pointer;">P0: None</label>
        	<input type="checkbox" name="prophylaxis[]" id="pnone" value="P0" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="ctx" style="cursor: pointer;">P1: CTX</label>
        	<input type="checkbox" name="prophylaxis[]" id="ctx" value="P1" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="fluconazole" style="cursor: pointer;">P2: Fluconazole</label>
        	<input type="checkbox" name="prophylaxis[]" id="fluconazole" value="P2" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="dapsone" style="cursor: pointer;">P3: Dapsone</label>
        	<input type="checkbox" name="prophylaxis[]" id="dapsone" value="P3" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="inh" style="cursor: pointer;">P4: INH</label>
        	<input type="checkbox" name="prophylaxis[]" id="inh" value="P4" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="prophylaxis_other" style="cursor: pointer;">P5: Other SPecify</label>
        	<input type="checkbox" name="prophylaxis[]" id="prophylaxis_other" value="P5" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr style="background-color:#ccc;height:3px;"><td></td><td></td></tr>

	<tr>
        <td>INH Start Date:</td>
        <td><input type="date" name="inhstartdate" style="margin-top: 10px;" readonly></td>
    </tr>
	<tr>
        <td>INH End Date:</td>
        <td><input type="date" name="inhenddate" readonly></td>
    </tr>
	
	<tr>
        <td>ART:</td>
        <td><input type="checkbox" name="ART" value="1" style="width:auto;"/></td>
    </tr>
    <tr style="background-color:#ccc;height:3px;"><td></td><td></td></tr>
    
<!-- Contraceptive Method -->
    <tr>
        <td rowspan='10'>Not Start ARV Reason:</td>
    </tr>
    <tr>
        <td style="padding-top: 10px;"> 
        	<label for="narvnone" style="cursor: pointer;">N0: None</label>
        	<input type="checkbox" name="nostartARVreason[]" id="narvnone" value="N0" style="width:auto; margin-right:5px;"/>
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="immcriteriafail" style="cursor: pointer;">N1: Immunologic criteria not satisfied ...</label>
        	<input type="checkbox" name="nostartARVreason[]" id="immcriteriafail" value="N1" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="immstatusunknown" style="cursor: pointer;">N2: Immunologic status not known ...</label>
        	<input type="checkbox" name="nostartARVreason[]" id="immstatusunknown" value="N2" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="pregnant" style="cursor: pointer;">N3: Pregnant</label>
        	<input type="checkbox" name="nostartARVreason[]" id="pregnant" value="N3" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="druginteractions" style="cursor: pointer;">N4: Drug Interactions</label>
        	<input type="checkbox" name="nostartARVreason[]" id="druginteractions" value="N4" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="clinicalcontraindicates" style="cursor: pointer;">N5: Clinically contra-indicates...</label>
        	<input type="checkbox" name="nostartARVreason[]" id="clinicalcontraindicates" value="N5" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="unablemaintain" style="cursor: pointer;">N6: Unable to maintain ...</label>
        	<input type="checkbox" name="nostartARVreason[]" id="unablemaintain" value="N6" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
	<tr>
        <td> 
        	<label for="unavailabledrugs" style="cursor: pointer;">N7: Non-availability of drugs</label>
        	<input type="checkbox" name="nostartARVreason[]" id="unavailabledrugs" value="N7" style="width:auto; margin-right:5px;" />
    	</td>
    </tr>
    <tr>
        <td> 
        	<label for="noarvspecify" style="cursor: pointer;">N8: Other (Specify)</label>
        	<input type="checkbox" name="nostartARVreason[]" id="noarvspecify" value="N8 " style="width:auto; margin-right:5px;" />
    	</td>
    </tr>

    <tr style="background-color:#ccc;height:3px;"><td></td><td></td></tr>
</table>

<script>
$(document).ready(function () {   
	//None Logic
	$('input[name="nostartARVreason[]"]').on('change', function(e){
		$('input[name="nostartARVreason[]"]').prop('disabled',false);
		if($(this).val()=='N0' && $(this).prop('checked')){
			$('input[name="nostartARVreason[]"]').prop("checked", false).prop('disabled',true);
			$(this).prop('disabled',false).prop("checked", true);
		}	
	});
	
	$('input[name="prophylaxis[]"]').on('change', function(e){
		$('input[name="prophylaxis[]"]').prop('disabled',false);
		if($(this).val()=='P0' && $(this).prop('checked')){
			$('input[name="prophylaxis[]"]').prop("checked", false).prop('disabled',true);
			$(this).prop('disabled',false).prop("checked", true);
			$('input[name="inhenddate"]').prop("readonly", true).val('');
			$('input[name="inhstartdate"]').prop("readonly", true).val('');
		}
		//console.log($(this).val());
		if($(this).val()=='P4' && $(this).prop('checked')){
			$('input[name="inhstartdate"]').prop("readonly", false);
			$('input[name="inhenddate"]').prop("readonly", false);
		}
		if($(this).val()=='P4' && $(this).prop('checked') !=true){
			$('input[name="inhenddate"]').prop("readonly", true).val('');
			$('input[name="inhstartdate"]').prop("readonly", true).val('');
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
	$('input[name="inhstartdate"],input[name="inhenddate"]').prop('max',[year, month, day].join('-'));
});
</script>
