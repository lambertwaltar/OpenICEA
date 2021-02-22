<form id="msform" class="encounterform" >
    <?php echo e(csrf_field()); ?>

    <!-- Prescription -->
        <div style='margin-bottom: 1%; z-index: 1;'>
            <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;">PRESCRIPTION</h2>
            <div style="display: inline-block; min-width: 200px; margin-right:15px; vertical-align: top;width: 47%;">
                <input type="hidden" name="encounterno" id="encounterno">
                <table class="prescription_table">
                    <tr>
                        <td>Prescription No:</td><td> <input type="text" name="prescription_no" id="prescription_no" readonly value='0'></td>
                    </tr>
                    <tr>
                        <td>Full Name:</td><td>  
                            <input type="hidden" name="idcno" id="idcno">
                            <input type="text" name="fullname" id="fullname" readonly></td>
                    </tr>
                    <tr>
                        <td>Current ART Regimen:</td>
                        <td> 
                            <select class="form-control" name="currentartregimen">
                                <option value="">---</option>
                                <?php $__currentLoopData = $regimens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $regimen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($regimen->OID); ?>"><?php echo e($regimen->Code); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Provider</td><td> <input type="text" name="provider" value="<?php echo e(Auth::user()->FirstName.' '. Auth::user()->LastName); ?>" readonly></td>
                    </tr>
                </table>
            </div>
            <div style="display: inline-block; min-width: 200px; margin-right:15px; vertical-align: top;width: 47%;">
                 <table class="prescription_table">
                    <tr>
                        <td>Funding</td>
                        <td>
                            <select class="form-control" name="funding">
                                <option value="">---</option>
                                <?php $__currentLoopData = $fundings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $funding): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($funding->OID); ?>"><?php echo e($funding->Code); ?>:<?php echo e($funding->Name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Pharmacy Visit:</td>
                        <td>  
                             <select class="form-control" name="pharmacyvisit">
                                <option value="">---</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>DSDM Type</td>
                        <td> 
                             <select class="form-control" name="dsdmtype">
                                <option value="">---</option>
                                 <?php $__currentLoopData = $dsdms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsdm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($dsdm->OID); ?>"><?php echo e($dsdm->Description); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Prescription Date</td><td>  <input type="date" name="prescription_date" id="prescription_date"></td>
                    </tr>
                </table>
            </div>
        </div>

    <!-- prescription Item -->
        <div style='margin-bottom: 1%; z-index: 1;'>
            <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;">PRESCRIPTION ITEM</h2>
            <div style="display: inline-block; min-width: 200px; margin-right:15px; vertical-align: top;width: 47%;">
                <table class="prescription_table" >
                    <tr>
                        <td>Drug</td>
                        <td> 
                            <input type="text" focus name="drug" id="drug" placeholder="type drug name to select ">
                            <input type="hidden" name="drugoid" id="drugoid">
                            <input type="hidden" name="preparation" id="preparation">
                            <div id="drugList" style="z-index: 9999; position: absolute;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Dose</td><td>  <input type="text" name="drugdose" id="drugdose" readonly ></td>
                    </tr>
                    <tr>
                        <td>Schedule</td>
                        <td> 
                            <select class="form-control" name="schedule" id="schedule">
                                <option value="">---</option>
                                <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($schedule->OID); ?>"><?php echo e($schedule->Frequency); ?> (<?php echo e($schedule->Code); ?>)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Tabs/Caps</td>
                        <td> 
                            <select class="form-control" name="tabs_caps" id="tabs_caps">
                                <option value="">---</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="0.5">0.5</option>
                                <option value="0.25">0.25</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Reason for Antibiotic</td><td> <input type="text" name="antibiotic_reason"></td>
                    </tr>
                </table>
            </div>
            <div style="display: inline-block; min-width: 200px; margin-right:15px; vertical-align: top;width: 47%;">
                 <table class="prescription_table">
                    <tr>
                        <td>No of Days:</td><td><input type="text" name="days" id="days" ></td>
                    </tr>
                    <tr>
                        <td>Quantity:</td><td><input type="text" name="quantity" id="quantity" readonly></td>
                    </tr>
                    <tr>
                        <td>Unit Price:</td><td><input type="text" name="unitprice" id="unitprice" readonly>
                    </tr>
                    <tr>
                        <td>Total Cost</td><td><input type="text" name="totalcost" id="totalcost" readonly></td>
                    </tr>

                    <tr>
                        <td colspan="2"><a href="" style="cursor: pointer; float: right;" class="small" id="additem"><img src="images/additem.gif" style="width:25px;" />Add Item</a></td>
                    </tr>
                </table>
            </div>
        </div>

    <!-- prescription Items-->
        <div style=" border-radius:5px; margin:10px; margin-top:1%; ">
            <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;">PRESCRIPTION ITEMS</h2>
            <div class="limiter">
                <div class="container-table100">
                    <div class="wrap-table100">
                        <div class="table100 ver1 m-b-110" style="padding-top:0px !important">   
                            <div class="table100-body js-pscroll">
                                <table class="prescription_table" id="prescriptionitems">
                                    <thead>
                                        <tr class="row100 head">
                                            <th class="cell100 column1">Drug</th>
                                            <th class="cell100 column1">For Sale</th>
                                            <th class="cell100 column1">No of Days</th>
                                            <th class="cell100 column1">Schedule</th>
                                            <th class="cell100 column1">Quantity</th>                                 
                                            <th class="cell100 column1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="row100 body clickable-row"><td class="cell100 column1"></td></tr> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style=" border-radius:5px; margin:10px; margin-top:1%; ">
            <table class="prescription_table">
                <tr>
                    <td>
                        <textarea placeholder="Notes" name="notes" id="notes" style="min-width: 100%; "></textarea>
                    </td>
                </tr>

            </table>
            
        </div>

	    <div class="modal-footer">
	       	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <input type="button" name="saveprescription" class="action-button" value="Save" id="saveprescription" />
	    </div>
</form>

<script type="text/javascript">
    var yn = { 1:'Yes', 2:'No' };


	// prescription form dynamics
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
            
            $('input[name="prescription_date"]').attr('min', [year, month, day].join('-'));
            $('input[type="date"]').val([year, month, day].join('-'));
		});

    //prescription autocomplete
        $(document).ready(function(){
            $('#drug').keyup(function(){ 
                var query = $(this).val();
                if(query != '')
                {
                 var _token = $('input[name="_token"]').val();
                 $.ajax({
                    url:"<?php echo e(route('selectdrug')); ?>",
                    method:"GET",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#drugList').fadeIn();  
                        $('#drugList').html(data);
                    }
                 });
                }

    //save prescription
        $('#saveprescription').bind('click',function(e){
            e.preventDefault();
            var abreason = $('input[name="antibiotic_reason"]').val();
            var notes = $('#notes').val();
            var regimenoid = $('select[name="currentartregimen"]').val();
            var encounterno = $('input[name="encounterno"]').val();
            var idcno = $('input[name="idcno"]').val();
            var pharmacyvisit = $('select[name="pharmacyvisit"]').val();
            var dsdmtype = $('select[name="dsdmtype"]').val();
            var form = new FormData(document.getElementById('msform'));

            $.ajax({
                type: 'post',
                url: '<?php echo e(route("createprescription")); ?>',
                data: form,
                processData: false,
                contentType: false,
                success: function(data)
                {   
                    toastr.success("Prescription Successful");
                    $('.modal').each(function(){
                        $(this).modal('hide');
                        $('#mymodal .modal-dialog').removeClass("modal-lg");
                        $('#mymodal .modal-title').text('');
                    });
                },
                error: function(){
                    console.log('Error');
                }, 
                
            });       
        });

    //Update prescription
        $('#editprescription').bind('click',function(e){
            debugger
            e.preventDefault();
            var form = new FormData(document.getElementById('msform'));
            $.ajax({
                type: 'post',
                url: '<?php echo e(route("updateprescription")); ?>',
                data: form,
                processData: false,
                contentType: false,
                success: function(data)
                {   
                    toastr.success("Prescription Updated");
                    $('.modal').each(function(){
                        $(this).modal('hide');
                        $('#mymodal .modal-dialog').removeClass("modal-lg");
                        $('#mymodal .modal-title').text('');
                    });
                },
                error: function(){
                    console.log('Error');
                }, 
                
            });       
        });



            });

            $('#drugList').on('click', 'li', function(e){ 
                e.preventDefault();
                $('#preparation').val($(this).find("input[name='prep']").val());
                $('#drug').val($(this).text());
                $('#drugoid').val($(this).find("input[name='oid']").val());
                $('#drugdose').val($(this).find("input[name='dose']").val());
                $('#unitprice').val($(this).find("input[name='uprice']").val());
                
                $('#drugList').fadeOut();  
            });

        });

    //prescription Quantity Calculator
        $(document).on('click change keyup','#drugList li,#days,#tabs_caps',function(){
            var preparation = $('#preparation').val();
            var days = $('#days').val();
            var frequency = $('#schedule option:selected').text().split(" ");
            var tabs = $('#tabs_caps').val();
            var unitprice = $('#unitprice').val();

            if(unitprice==''){
                unitprice = 0;
            }

             $('#quantity').val('');
             $('#totalcost').val('');

            if(preparation=='1' || preparation=='2'){
                $('#tabs_caps').attr('disabled',false);
                if(days!='' || days==null){
                    if(tabs!='' || tabs==null){
                       var quantity = parseInt(frequency[0])*parseInt(days)*parseFloat(tabs);
                       var total = quantity*parseFloat(unitprice);
                       $('#quantity').val(quantity);
                       $('#totalcost').val(parseFloat(total).toFixed(2));
                    }
                    else{
                        var quantity = parseInt(frequency[0])*parseInt(days);
                        var total = quantity*parseFloat(unitprice);
                        $('#quantity').val(quantity);
                        $('#totalcost').val(parseFloat(total).toFixed(2));
                    }
                }
            }
            else{
                $('#tabs_caps').attr('disabled',true);
            }            
        });

    //save prescription item
        $('#msform').on('click','#additem',function(e){
            e.preventDefault();
            var quantity = $('#quantity').val();
            var days = $('#days').val();
            var abreason = $('input[name="antibiotic_reason"]').val();
            var totalcost = $('#totalcost').val();
            var unitprice = $('#unitprice').val();
            var schedule = $('#schedule').val();
            var drugoid = $('#drugoid').val();

            $.ajax({
                type: 'get',
                url: '<?php echo e(route("createprescriptionitem")); ?>',
                data: {'quantity':quantity,'days':days,'abreason':abreason,'totalcost':totalcost,'unitprice':unitprice,'schedule':schedule,'drugoid':drugoid},
                success: function(data)
                {   

                    var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemOID[]' value='" +data.OID+"'>"+data.pidrug.DrugName+"</td><td class='cell100 column1'>"+yn[data.pidrug.ForSale]+"</td><td class='cell100 column1'>" + data.NoOfDays + "</td><td class='cell100 column1'>"+data.pischedule.Frequency+" "+data.pischedule.Code+"</td><td class='cell100 column1'>" + data.Quantity +"</td><td class='cell100 column1'><a id='removerow' onclick='deletepitem(this)' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Remove Phone'></a></td></tr>";
                    $("#prescriptionitems tbody").append(markup);
               

                    //unset prescription information
                    $('#quantity').val('');
                    $('#days').val('');
                    $('input[name="antibiotic_reason"]').val('');
                    $('#totalcost').val('');
                    $('#unitprice').val('');
                    $('#tabs_caps').attr('disabled',false);
                    $('#tabs_caps').val('');
                    $('#drug').val('');
                    $('#schedule').val('');
                    $('#drugdose').val('');
                    $('#drug').focus();
                    return; 

                console.log('success');
                },
                error: function(){
                    console.log('Error');
                }, 
                
            });       
        });

    //delete prescription Item
        function deletepitem(r){
            r.parentNode.parentNode.remove();
            var id = r.parentNode.parentNode.getElementsByTagName('input')[0].value;
            $.ajax({
                type: 'get',
                url: '<?php echo e(route("deleteprescriptionitem")); ?>',
                data:{'id':id},
                success: function(data)
                {                                           
                    
                }

            });

        }

</script>
<?php /**PATH C:\xampp\htdocs\OpenICEA\modules/Prescription\Resources/views/newprescription.blade.php ENDPATH**/ ?>