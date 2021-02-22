<form id="msform" class="encounterform" >
<!--     <fieldset> -->
    {{ csrf_field() }}
    <div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110" id="encounterpatientdetailstable" style="display: none;margin-bottom:10px;">
					<div class="table100-head">
					</div>
					<div class="table100-body js-pscroll">
						<table ><tbody>
							<tr class="row100 body clickable-row"><td class="cell100 column1"></td></tr>
							<tr class="row100 body clickable-row">
								<th class="cell100 column3" >Client Name</th><td class="cell100 column1" id="patientname" ></td>
							</tr>
							<tr class="row100 body clickable-row">
								<th class="cell100 column3" >Client Number</th><td class="cell100 column1" id="patidcno"></td>
							</tr>
						</tbody></table>
					</div>
				</div>
			</div>
		</div>
	</div>
    <input type="hidden" name="patientidcno" id="patientidcno" placeholder="Client IDCNO" />
  	<span class="error" style="display:none;" id="encounterformerror"></span>
    
    <input type="date" name="visitdate" placeholder="Visit Date:   " id="visitdate" />

    <select class="form-control" name="visitor" id="visitor" required>
        <option value="">Visitor</option>
        <option value="1">Self</option>
        <option value="2">Relative</option>
        <option value="3">Friend</option>
        <option value="4">Home_Visitor</option>
        <option value="5">Father</option>
        <option value="6">Mother</option>
        <option value="7">Sister</option>
        <option value="8">Brother</option>
        <option value="9">Son</option>
        <option value="10">Daughter</option>
        <option value="11">Spouse</option>
        <option value="12">Call COnsultation</option>
        <option value="13">Other</option>
    </select>
     <input type="hidden" name="othervisitor" id="othervisitor" placeholder="Other Visitor" />

     <select class="form-control" name="representationreason" id="representationreason" required>
        <option value="">Reason for representation</option>
        <option value="1">Travelled</option>
        <option value="2">Admitted</option>
        <option value="3">Work</option>
        <option value="4">Disabled/Cant Walk</option>
        <option value="5">No Time</option>
        <option value="6">CCLAD</option>
        <option value="7">Other</option>
    </select>
    <input type="hidden" name="otherrepreason" id="otherrepreason" placeholder="Other reason" />

    <div style="text-align: left;">
        <label for="isprivate" style="float: left; font-size:0.8em; margin:5px; color:#495057; font-family: montserrat;"> Is Visit Private?</label>
        <input type="checkbox" id="isprivate" name="isprivate" value="1" style="float: left; width:auto; margin:5px;  width: 1.5em; height: 1.5em;">
    </div>

	<select class="form-control" name="visittype" id="visittype" required>
    	<option value="">Visit Type</option>
    	<option value="1">Normal General Clinic</option>
        <option value="2">Urgent Review</option>
        <option value="3">Private Clinic</option>
        <option value="4">SRH CLinic-infants</option>
        <option value="5">Tag Clinic</option>
        <option value="6">Major Visit</option>
        <option value="7">Continuous Adherence</option>
    	<option value="8">CCLAD</option>
        <option value="9">Outbreak Preparedness</option>
    	<option value="">Other</option>
    </select>
    <input type="hidden" name="othervisittype" id="othervisittype" placeholder="Specify Other Visit Type" />
    <label for="reasontable" style="text-align: left;font-family: montserrat; font-size: 0.8em;float:left; color:#2C3E50;margin-right: 20px;">Visit Reason</label>
    <div style="overflow: auto; height: 150px; display:inline-block">
        <table style="text-align:left;" id="reasontable">
            @foreach($appointmenttypes as $appointmenttype)
                <tr>
                    <td>
                        <div class="pretty p-default">
                            <input type="checkbox" name="reasons[]" value="{{ $appointmenttype->OID }}"/><div class="state p-primary"><label>{{ $appointmenttype->Name }}</label></div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="modal-footer">
       	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" name="encountersubmit" class="encountersubmit action-button" value="Save" id="recordencounter" />
    </div>
<!--     </fieldset> -->
</form>

<script type="text/javascript">
    $(document).ready(function () {
            var fullDate = new Date(),
            month = '' + (fullDate.getMonth() + 1),
            day = '' + fullDate.getDate(),
            year = fullDate.getFullYear();

            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;
            
            $('input[type="date"]').attr('max', [year, month, day].join('-'));
            $('input[type="date"]').val([year, month, day].join('-'));
        });

    
</script>