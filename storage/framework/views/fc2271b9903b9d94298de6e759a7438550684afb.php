<h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Concurrent Medical Conditions</h2>
<table class="prescription_table">
<!-- Concurrent medical conditions -->

    <tr>
        <td>DVT</td>
		<td>
			<select class="form-control" name="dvt" style="min-width:100px; max-width: 100px;">
                <option value="">---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
		</td>
		<td>Asthma</td>
		<td>
			<select class="form-control" name="asthma" style="min-width:100px; max-width: 100px;">
                <option value="">---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
		</td>
    </tr>
	
	<tr>
        <td>Epilepsy</td>
		<td>
			<select class="form-control" name="epilepsy" style="min-width:100px; max-width: 100px;">
                <option value="">---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
		</td>
		<td>Mental Health Illness</td>
		<td>
			<select class="form-control" name="mentalillness" style="min-width:100px; max-width: 100px;">
                <option value="">---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
		</td>
    </tr>
	
	<tr>
        <td>Hepatitis B</td>
		<td>
			<select class="form-control" name="hepatitisb" style="min-width:100px; max-width: 100px;">
                <option value="">---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
		</td>
		<td>Disability</td>
		<td>
			<select class="form-control" name="disability" style="min-width:100px; max-width: 100px;">
                <option value="">---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
		</td>
    </tr>
	
	<tr>
        <td>Specify Disability</td>
		<td>
			<select class="form-control" name="specifydisability" style="min-width:100px; max-width: 100px;" disabled>
                <option value="">---</option>
				<option value="Blind">Blind</option>
                <option value="Deaf">Deaf</option>
				<option value="Missing Limb">Missing Limb</option>
                <option value="Polio">Polio</option>
				<option value="other">Other</option>
            </select>
		</td>
		<td>Other Disability</td>
		<td>
			<input type="text" name="otherdisability" readonly />
		</td>
    </tr>
	<tr>
		<td>Other Medical Condition</td>
		<td colspan="3">
			<input type="text" name="othermedicalcondition"/>
		</td>
    </tr>
    <tr><td colspan="4"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Visit Notes</h2></td></tr>
	<tr>
		<td>Comments:</td><td colspan="3"><textarea name="visitreasons" id="visitreasons" style="min-width: 350px;"></textarea></td>
	</tr>
	<tr>
		<td>Provider:</td><td colspan="3"><input type="text" name="provider" value="<?php echo e(Auth::user()->FirstName.' '. Auth::user()->LastName); ?>" readonly></td>
	</tr>
</table>

<script>
$(document).ready(function () {   
//None Logic
	$('select[name="disability"]').on('change', function(e){
		$('select[name="specifydisability"]').prop('disabled',false);
		if($(this).val()!=='Yes'){
			$('select[name="specifydisability"]').prop('disabled',true);
		}	
	});
	
	$('select[name="specifydisability"]').on('change', function(e){
		$('input[name="otherdisability"]').prop('readonly',false);
		if($(this).val()!=='other'){
			$('input[name="otherdisability"]').prop('readonly',true).val('');
		}	
	});
});
</script><?php /**PATH C:\xampp\htdocs\OpenICEA\modules/Patient\Resources/views/flowsheet/concurrentconditions.blade.php ENDPATH**/ ?>