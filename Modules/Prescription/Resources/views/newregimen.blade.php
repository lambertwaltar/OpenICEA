<form id="msform">
    {{ csrf_field() }}
    <input type="text" name="code" id="code" placeholder="Code" required />
	<select class="form-control" name="regimentype" id="regimentype" required>
    	<option value="">Select Regimen Type</option>
    	<option value="1">ART</option>
    	<option value="2">TB</option>
    </select>
    <label for="drugtable" style="text-align: left;font-family: montserrat; font-size: 0.8em;float:left; color:#2C3E50;margin-right: 20px;">Specify drugs contained</label>
    <div style="overflow: auto; height: 150px; width: 250px;display:inline-block">
        <table style="text-align:left;" id="drugtable">
            @foreach($drugs as $drug)
                <tr>
                    <td>
                        <div class="pretty p-default">
                            <input type="checkbox" name="drugs[]" value="{{ $drug->OID }}"/><div class="state p-primary"><label>{{ $drug->DrugName }}</label></div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <span class="error" style="display:none;" id="encounterformerror"></span>  
    <div class="modal-footer">
       	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" name="saveregimen" class="action-button" value="Save" id="saveregimen" />
    </div>
</form>
