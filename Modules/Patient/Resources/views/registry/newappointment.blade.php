<form id="msform" class="encounterform" >
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
    <input type="date" name="returndate" placeholder="Return Date:   " id="visitdate"/>
    <input type="time" name="returntime" placeholder="Return time" id="returntime" />
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
        <input type="button" name="appointmentsave" class="action-button" value="Save" id="saveappointment" />
    </div>

</form>

<script type="text/javascript">
    //date
        $(document).ready(function () {
            var fullDate = new Date(),
            month = '' + (fullDate.getMonth() + 1),
            day = '' + fullDate.getDate(),
            year = fullDate.getFullYear();

            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;
            $('input[name="returndate"]').attr('min',[year, month, day].join('-'));


            $('#saveappointment').on('click',function(e){
                e.preventDefault();
                var form = new FormData(document.getElementById('msform'));
                $.ajax({
                    type: 'post',
                    url: '{{route("saveappointment")}}',
                    data: form,
                    processData: false,
                    contentType: false,
                    success: function(data)
                    {
                        if(data.error){
                            toastr.error(data.error);
                            return;
                        }

                        $('#mymodal').modal('hide');
                        toastr.success("Client Appointment Scheduled");

                        $('#mymodal').on('hidden.bs.modal', function () {
                           $('#mymodal .modal-dialog').removeClass("modal-lg");
                           $('#mymodal .modal-title').text('');
                        });
                    },
                    error: function(){
                        toastr.error("Something Went Wrong");
                        console.log('Error');   
                    },
                });
            });

        });



</script>