<div class="limiter">
	<div class="container-table100">
		<div class="wrap-table100">
			<div class="table100 ver1 m-b-110">
				<div class="table100-head">
					<table>
						<thead>
							<tr class="row100 head">
								<th class="cell100 column1">Prescription No</th>
								<th class="cell100 column2">Prescription Date</th>
								<th class="cell100 column2">Issued Date</th>
								<th class="cell100 column4">Prescription Drugs</th>
								<th class="cell100 column4">Issued Status</th>
								<th class="cell100 column2">Provider</th>
								<th class="cell100 column2"></th>
							</tr>
						</thead>
					</table>
				</div>
				<div class="table100-body js-pscroll">
					<table id="encounterprescriptions">
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal-footer">
   	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

<script type="text/javascript">
	var yn = { 1:'Yes', 2:'No' };
    //edit encounter modal
        function editprescription(r)
        {       
            var href = r.getAttribute("href");
            var url = new URL(href);
            var formurl = url.searchParams.get("modalroute");
            ///alert(formurl);
            var id = r.parentNode.parentNode.getElementsByTagName('input')[0].value;
            $.ajax({
                type: 'get',
                url: href,
                data:{'id':id},
                success: function(data)
                {                                           
                    $('#partial2').load(formurl,function(){
                        $('#mymodal2').modal({show:true});
                        $('#mymodal2 .modal-title').text('Edit Prescription');              
                        $("input[name='saveprescription']").val('Save');
                        $("input[name='saveprescription']").attr('id','editprescription');
                        $('#mymodal2 .modal-dialog').addClass("modal-lg");

                        $(document).ready(function(){
                            for (var i = 0; i < data.length; i++){
                                var items = data[i].prescriptionitems;
                                $("input[name='encounterno']").val(data[i].pencounter.OID);
                                $("input[name='prescription_no']").val(data[i].OID);
                                $("input[name='idcno']").val(data[i].ppatient.IDCNO);
                                $("input[name='fullname']").val(data[i].ppatient.Surname +" "+data[i].ppatient.FirstName); 
                                $("select[name='currentartregimen']").val(data[i].pregimen.OID);
                                $("select[name='pharmacyvisit']").val(data[i].PharmacyVisit);
                                $("select[name='dsdmtype']").val(data[i].DSDM_Type);
                                
                                $("textarea[name='notes']").val(data[i].Notes);
                                $("input[name='antibiotic_reason']").val(data[i].AntibioticReason);

                                //change date to readonly
                                $("input[name='prescription_date']").prop('type','text');
                                $("input[name='prescription_date']").prop('readonly','readonly');
                                var date = data[i].PrescriptionDate.split("-");
                                $("input[name='prescription_date']").val([date[2], date[1], date[0]].join('/'));

                                for(var j=0; j<items.length; j++){
                                    var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemOID[]' value='" +items[j].OID+"'>"+items[j].pidrug.DrugName+"</td><td class='cell100 column1'>"+yn[items[j].pidrug.ForSale]+"</td><td class='cell100 column1'>" + items[j].NoOfDays + "</td><td class='cell100 column1'>"+items[j].pischedule.Frequency+" "+items[j].pischedule.Code+"</td><td class='cell100 column1'>" + items[j].Quantity +"</td><td class='cell100 column1'><a id='removerow' onclick='deletepitem(this)' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Remove Phone'></a></td></tr>";
                                    $("#prescriptionitems tbody").append(markup);
                                }
                            }

                        });
                        

                        return;
                    });

                }

            });
        }

</script>


        
  <?php /**PATH C:\xampp\htdocs\OpenICEA\modules/Prescription\Resources/views/prescriptions.blade.php ENDPATH**/ ?>