<!-- Generic Modal 1 -->
    <div class="modal fade" data-keyboard="false" data-backdrop="static" id="mymodal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="partial" class="modal-body"></div>
            </div>
        </div>
    </div> 

<!-- Generic Modal 2 for patient -->
    <div class="modal fade" data-keyboard="false" data-backdrop="static" id="mymodal2" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="partial2" class="modal-body"></div>
            </div>
        </div>
    </div> 

<!-- phone details Modal -->
    <div id="phonemodal">
        <div class="modal fade" id="phoneform"  tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Phone Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="msform" method="post" class="phoneform">
                            <?php echo e(csrf_field()); ?>

                            <input class="needs-validation" type="text" name="phonenumber" id="phonenumber" placeholder="Phone Number" value="<?php echo e(old('phonenumber')); ?>" pattern="([0-9]){10}" title="eg.0789563172" autofocus />
                            <span class="error" id="phoneerror" style="display:none;"></span> 

                            <input type="text" name="tamaphonenumber" id="tamaphonenumber" placeholder="TAMA Phone Number" value="<?php echo e(old('tamaphonenumber')); ?>"/>
                            <?php if($errors->has('tamaphonenumber')): ?>
                                  <span class="error"><?php echo e($errors->first('tamaphonenumber')); ?></span>
                            <?php endif; ?> 
                       
                            <select class="form-control" name="tamacategoty" id="tamacategoty"  >
                                <option value="">TAMA Category</option>
                                <option value="1">TAMA LITE</option>
                                <option value="2">TAMA RCT</option>
                            </select>

                            <div style="text-align: left;">
                                <label for="personalcontact" style="float: left; font-size:0.8em; margin:5px; color:#495057; font-family: montserrat;"> Is Client's personal Contact?</label>
                                <input type="checkbox" id="personalcontact" name="personalcontact" style="float: left; width:auto; margin:5px;  width: 1.5em; height: 1.5em;" onclick="disableMyText()">
                            </div>

                            <input type="text" name="phonefirstname" id="phonefirstname" placeholder="First Name" value="<?php echo e(old('phonefirstname')); ?>"/>
                            <?php if($errors->has('phonefirstname')): ?>
                                  <span class="error"><?php echo e($errors->first('phonefirstname')); ?></span>
                            <?php endif; ?>

                            <input type="text" name="phonesurname" id="phonesurname" placeholder="Surname" value="<?php echo e(old('phonesurname')); ?>" />
                            <?php if($errors->has('phonesurname')): ?>
                                  <span class="error"><?php echo e($errors->first('phonesurname')); ?></span>
                            <?php endif; ?>

                            <input type="text" name="relationship" id="relationship" placeholder="Relationship" value="<?php echo e(old('relationship')); ?>" />
                            <?php if($errors->has('relationship')): ?>
                                  <span class="error"><?php echo e($errors->first('relationship')); ?></span>
                            <?php endif; ?>

                            <div style="text-align: left;">
                                <label for="contactperson" style="float: left; font-size:0.8em; margin:5px; color:#495057; font-family: montserrat;">Should this person be contacted?</label>
                                <input type="checkbox" id="contactperson" name="contactperson"  style="float: left; width:auto; margin:5px;  width: 1.5em; height: 1.5em;">
                            </div>

                            <div style="text-align: left;clear: left; display: flex;">
                                <label for="disclosedperson" style="font-size:0.8em; margin:5px; color:#495057; font-family: montserrat;"> Have disclosed to this person?</label>
                                <input type="checkbox" id="disclosedperson" name="disclosedperson" style="width:auto; margin:5px;  width: 1.5em; height: 1.5em; ">
                            </div>

                            <textarea name="phonedescription" id="phonedescription" placeholder="Description" value="<?php echo e(old('phonedescription')); ?>"></textarea>
                            <div class="modal-footer" style="clear:both">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" name="submit" class="phonesubmit action-button" value="Save Phone" id="savephone" style="float:left;" />
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
          
<!-- Footer html -->
    <footer class="bg-white sticky-footer fixed-bottom" style="line-height: 60px; color:#ffffff; background: #999999 !important; font-family: Lato-Regular; font-size: 0.8em !important;">
		<div style="font-size:0.9em; float:left; margin:0 15px;">Current User: <?php echo e(Auth::user()->FirstName.' '. Auth::user()->LastName); ?></div>
		<div class="container my-auto" style="position: absolute;font-size:0.9em;">
			<div class="text-center my-auto copyright"><span>Copyright © OpenICEA 2021</span> | Infectious Diseases Institute</div>
		</div>
        <div style="float:right;font-size:0.9em;margin:0 15px;">Reviewed by: Dr. Isaac Lwanga | Dr. Noela Clara | Dr. Ahmed Ddungu</div>
	</footer>
    </div>

<?php echo $__env->yieldContent('footer-links'); ?>
<script type="text/javascript" src="<?php echo e(url('js/multiple-select.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/registration.js')); ?>"></script>
<!-- <script type="text/javascript" src="<?php echo e(url('js/toastr.js')); ?>"></script> -->
<script type="text/javascript">
    //load settings page
        $(document).on('click', '#settings', function(e) {
            e.preventDefault();
            var href = $(this).attr("href");
            $('#partial').load(href,function(){
                $('#mymodal').modal({show:true});
                $('.modal-title').text('OpenICEA | Settings');
                // $('#mymodal .modal-body').css("min-height","300px");
                $('#mymodal .modal-dialog').addClass("modal-xl");
                return;
            });
        });

    //load Flowsheets form
        $(document).on('click', '#flowsheets', function(e) {
            e.preventDefault();
            var href = $(this).attr("href");
            var url = new URL(href);
            var encounterno = url.searchParams.get("encounterno");
            var lname = url.searchParams.get("lname");
            var fname = url.searchParams.get("fname");
            var idcno = url.searchParams.get("idcno");
            var vdate = url.searchParams.get("vdate");
            var dob = url.searchParams.get("dob"); 

            if(encounterno != null){
                $('#partial').load(href,function(){
                    $('#mymodal').modal({show:true});
                    $('.modal-title').text('Client FlowSheets');
                    $('#mymodal .modal-dialog').addClass("modal-xl");

                    $('#ffullname').val(lname+" "+fname);
                    $('#fencounterno').val(encounterno);
                    $('#fidcno').val(idcno);
                    $('#fvisitdate').val(vdate);
                    $('#fage').val(function() { // birthday is a date
                        var ageDifMs = Date.now() - new Date(dob).getTime();
                        var ageDate = new Date(ageDifMs); // miliseconds from epoch
                        return Math.abs(ageDate.getUTCFullYear() - 1970);
                    });
                    return;
                });

            }
            else{
                toastr.error("Please select an encounter to access this feature");
            }
            
        });

    //results dialog
        function labdialog(r)
        {       
            var href = r.getAttribute("href");
            var id = r.getAttribute('id');                        
            $('#partial').load(href,function(){
                $('#mymodal').modal({show:true});
                $('.modal-title').text(id);
                $('#mymodal .modal-dialog').css("max-width",'600px'); 
                return;
            });  
        }

    //Patient Labs
        $(document).on('click', '#viewlabs', function(e) {
            e.preventDefault();
            var href = $(this).attr("href");
            var url = new URL(href);
            var lname = url.searchParams.get("lname");
            var fname = url.searchParams.get("fname");
            var idcno = url.searchParams.get("idcno");
            // var encounterno = url.searchParams.get("encounterno");
            // var vdate = url.searchParams.get("vdate");
            if(idcno != null){
                $('#partial').load(href,function(){
                    $('#mymodal').modal({show:true});
                    $('#mymodal .modal-title').text('Client Labs');
                    $('#mymodal .modal-dialog').addClass("modal-xl");
                    $('input[name=idcno]').val(idcno);
                    return;
                });

                            }
            else{
                toastr.error("Please search for a patient to view Lab Results");
            }
            
        });

    //clear Notifications
        $(document).on('click', '#clear', function(e){
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '<?php echo e(route("marknotifications")); ?>',
                data: {"_token": "<?php echo e(csrf_token()); ?>"},
                success: function(){
                    getNotifications();
                },
            });
        });

    //get notifications
        function getNotifications(){
            $.ajax({
                type: 'get',
                url: '<?php echo e(route("getnotifications")); ?>',
                success: function(data)
                {
                    $('.notifications').html('');
                    $('.badge-counter').html('');
                    $('.badge-counter').append(data.length);
                    for(var i=0; i<data.length; i++){
                        var markup = '<li role="presentation" class="nav-item" ><a class="nav-link" ><img src="images/bell1.png" style="float:left;margin-right:5px;" /><span style="margin:0 !important;font-size: 0.8em;float: left;text-align: left;">['+data[i].created_at+']<br>'+ data[i].data.data +'</span> </a></li><hr class="solid">';
                        $('.notifications').append(markup);

                    }
                    $('.notifications.menu').append('<li role="presentation" class="nav-item" ><a href="" class="nav-link" id="clear" ><span style="margin:0 !important;font-size: 0.8em;float: left;text-align: center;">Clear All</span> </a></li>');
                    // $("#labtablebody").load("<?php echo e(route('labrequisitions')); ?>"+ " #labtablebody");
                },
            });
            

        }
        //setTimeout(function(){getNotifications();}, 10000);
        //setInterval(function(){getNotifications();}, 5000);

    //load triage form
        $(document).on('click', '#triageform', function(e) {
            e.preventDefault();
            var href = $(this).attr("href");
            var url = new URL(href);
            var encounterno = url.searchParams.get("encounterno");
            var lname = url.searchParams.get("lname");
            var fname = url.searchParams.get("fname");
            var idcno = url.searchParams.get("idcno");
            var vdate = url.searchParams.get("vdate");
            var dob = url.searchParams.get("dob");

            

            if(encounterno != null){
                $('#partial').load(href,function(){
                    $('#mymodal').modal({show:true});
                    $('.modal-title').text('Triage');
                    //$('#mymodal .modal-dialog').addClass("modal-lg");

                    $('#fullname').val(lname+" "+fname);
                    $('#encounterno').val(encounterno);
                    $('#idcno').val(idcno);
                    $('#visitdate').val(vdate);
                    $('#age').val(function() { // birthday is a date
                        var ageDifMs = Date.now() - new Date(dob).getTime();
                        var ageDate = new Date(ageDifMs); // miliseconds from epoch
                        return Math.abs(ageDate.getUTCFullYear() - 1970);
                    });
                    return;
                });

            }
            else{
                toastr.error("Please select an encounter to access this feature");
            }
            
        });

    //Edit Lab Requisition modal
        $(document).on('click', '#editlabrequisition', function(e) {
            e.preventDefault();
            var href = $(this).attr("href");
            var url = new URL(href);
            var encounterno = url.searchParams.get("encounterno");
            var lname = url.searchParams.get("lname");
            var fname = url.searchParams.get("fname");
            var idcno = url.searchParams.get("idcno");
            var vdate = url.searchParams.get("vdate");

            if(encounterno != null){
                $('#partial').load(href,function(){
                    $('#mymodal').modal({show:true});
                    $('.modal-title').text('Lab Requisition');
                    $('#mymodal .modal-dialog').addClass("modal-lg");

                    $('#fullname').val(lname+" "+fname);
                    $('#encounterno').val(encounterno);
                    $('#idcno').val(idcno);
                    $('#visitdate').val(vdate);
                    return;
                });

            }
            else{
                toastr.error("Please select an encounter to make a Lab Request");
            }
            
        });

    //Lab Requisition form modal
        $(document).on('click', '#newlabrequisition', function(e) {
            e.preventDefault();
            var href = $(this).attr("href");
            var url = new URL(href);
            var encounterno = url.searchParams.get("encounterno");
            var lname = url.searchParams.get("lname");
            var fname = url.searchParams.get("fname");
            var idcno = url.searchParams.get("idcno");
            var vdate = url.searchParams.get("vdate");

            if(encounterno != null){
                $('#partial').load(href,function(){
                    $('#mymodal').modal({show:true});
                    $('.modal-title').text('Lab Requisition');
                    $('#mymodal .modal-dialog').addClass("modal-lg");

                    $('#fullname').val(lname+" "+fname);
                    $('#encounterno').val(encounterno);
                    $('#idcno').val(idcno);
                    $('#visitdate').val(vdate);
                    return;
                });

            }
            else{
                toastr.error("Please select an encounter to make a Lab Request");
            }
            
        });

    //select encounter    
        $(document).on('click','#patientencounters tr', function() {
            //set prescription link details
			if($("#newprescription").length > 0){
				var prescriptionhref = $("#newprescription").attr("href");
				var prescriptionurl = new URL(prescriptionhref);
				prescriptionurl.searchParams.delete("encounterno");
				$("#newprescription").attr("href", prescriptionurl+"&encounterno="+$(this).find("input").val());
			}
            
			if($("#newlabrequisition").length > 0){
				var labhref = $("#newlabrequisition").attr("href");
				var laburl = new URL(labhref);
				laburl.searchParams.delete("encounterno");
				$("#newlabrequisition").attr("href", laburl+"&encounterno="+$(this).find("input").val()+"&vdate="+$(this).find('td:eq(0)').text());
			}
			
			if($("#flowsheets").length > 0){
				var flowsheethref = $("#flowsheets").attr("href");
				var flowsheeturl = new URL(flowsheethref);
				flowsheeturl.searchParams.delete("encounterno");
				$("#flowsheets").attr("href", flowsheeturl+"&encounterno="+$(this).find("input").val()+"&vdate="+$(this).find('td:eq(0)').text());
			}


            $('#patientencounters tr').css('background', '');
            if(this.style.background == "" || this.style.background =="white") {
            $(this).css('background', '#bad1cf');

            $.ajax({
                type: 'get',
                url: '<?php echo e(route("gettriagedetail")); ?>',
                data: {'encounterid':$(this).find("input").val(), 'idcno':$('#home_idcno').text(),},
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

                        //toastr.info("Encounter has no Triage Detail");

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


            }
            else {
                $(this).css('background', '');
            }
                
        });

    //prescriptions form modal
        $(document).on('click', '#newprescription', function(e) {
            e.preventDefault();
            var href = $(this).attr("href");
            var url = new URL(href);
            var encounterno = url.searchParams.get("encounterno");
            var lname = url.searchParams.get("lname");
            var fname = url.searchParams.get("fname");
            var idcno = url.searchParams.get("idcno");
            $.ajax({
                type: 'get',
                url: "<?php echo e(route('returnappointmentsetting')); ?>",
                success: function(data)
                {                                           
                    for(var i=0;i<data.length;i++){
                        if(data[i].Name ==='Return Appointments' && data[i].Status === 'Disabled'){
                            $.ajax({
                                type: 'get',
                                url: "<?php echo e(route('patientappointment')); ?>",
                                data: {'idcno':idcno},
                                success: function(data)
                                { 
                                    if(data.flowsheet===true){
                                        //console.log(data.flowsheetdata.BirthDate)
                                        for(var x=0;x<(data.flowsheetdata).length; x++){
                                            var flowd = data.flowsheetdata[x].patientfsdetail;
                                            var tdate = ( new Date() ).toLocaleDateString();
								
											//var tdate = (vdate).toLocaleDateString();
                                            for(var w=0;x<flowd.length;w++){
                                                console.log(( new Date(flowd[w].TriageDate) ).toLocaleDateString(),( new Date(flowd[w].fsencounter.visitDate) ).toLocaleDateString());
                                                if(( new Date(flowd[w].TriageDate) ).toLocaleDateString() === tdate){
                                                    console.log('Flowsheet is up to date');
                                                    if(encounterno != null){
                                                        $('#partial').load(href,function(){
                                                            $('#mymodal').modal({show:true});
                                                            $('.modal-title').text('New Prescription');
                                                            $('#mymodal .modal-dialog').addClass("modal-lg");
                                                            $('#encounterpatientdetailstable').css('display','block');
                                                            $('#fullname').val(lname+" "+fname);
                                                            $('#encounterno').val(encounterno);
                                                            $('#idcno').val(idcno);
                                                            return;
                                                        });

                                                    }
                                                    else{
                                                        toastr.error("Please select an encounter for which to prescribe");
                                                    }
                                                }
                                                else{
                                                    toastr.error("Please Fill out a client flowsheet first");
                                                }
                                            }
                                        }                                  
                                    }
                                    else{
                                        toastr.error("Fillout Client Flowsheet to allow prescription <br><hr style='background-color:#FFFFFF'>");
                                        return;
                                    }
                                }
                            });  
                            
                        }

                        if(data[i].Name ==='Return Appointments' && data[i].Status === 'Enabled'){
                            $.ajax({
                                type: 'get',
                                url: "<?php echo e(route('patientappointment')); ?>",
                                data: {'idcno':idcno},
                                success: function(data)
                                { 
                                    if(data.appointment===true && data.flowsheet===true){
                                        //console.log(data.flowsheetdata.BirthDate)
                                        for(var x=0;x<(data.flowsheetdata).length; x++){
											console.log(data.flowsheetdata[x].returnappointment.ReturnDate);
											var flowd = data.flowsheetdata[x].patientfsdetail;
                                            var tdate = ( new Date() ).toLocaleDateString();
											
											if((new Date(data.flowsheetdata[x].returnappointment.ReturnDate) ).toLocaleDateString() <= tdate){
												toastr.error("Please Schedule a client appointment to allow prescription <br><hr style='background-color:#FFFFFF'>or disable the Setting");
												return;
											}
											
                                            for(var w=0;x<flowd.length;w++){
                                                console.log(( new Date(flowd[w].TriageDate) ).toLocaleDateString(),tdate);
                                                if(( new Date(flowd[w].TriageDate) ).toLocaleDateString() === tdate){
                                                    console.log('Flowsheet is up to date');
                                                    if(encounterno != null){
                                                        $('#partial').load(href,function(){
                                                            $('#mymodal').modal({show:true});
                                                            $('.modal-title').text('New Prescription');
                                                            $('#mymodal .modal-dialog').addClass("modal-lg");
                                                            $('#encounterpatientdetailstable').css('display','block');
                                                            $('#fullname').val(lname+" "+fname);
                                                            $('#encounterno').val(encounterno);
                                                            $('#idcno').val(idcno);
                                                            return;
                                                        });

                                                    }
                                                    else{
                                                        toastr.error("Please select an encounter for which to prescribe");
                                                    }
                                                }
                                                else{
                                                    toastr.error("Please Fill out a client flowsheet first");
                                                }
                                            }
                                        }                                  
                                    }
                                    else{
                                        toastr.error("Please Schedule a client appointment/Fillout Client Flowsheet to allow prescription <br><hr style='background-color:#FFFFFF'>or disable the Setting");
                                        return;
                                    }
                                }
                            });                          
                        }
                    }
                }
             });


            
            
        });

    //Prescriptions
        function prescriptions(r)
        {       
            var href = r.getAttribute("href");
            var url = new URL(href);
            var id = r.parentNode.parentNode.getElementsByTagName('input')[0].value;
            $.ajax({
                type: 'get',
                url: "<?php echo e(route('prescriptionsforencounter')); ?>",
                data:{'id':id},
                success: function(data)
                {                                           
                    $('#partial').load(href,function(){
                        $('#mymodal').modal({show:true});
                        $('.modal-title').text('Prescriptions');
                        $('#mymodal .modal-dialog').addClass("modal-xl");

                        for(var i = 0; i<data.length; i++){

                            var markup = '<tr class="row100 body clickable-row"><td class="cell100 column1"><input type="hidden" name="itemid[]" value="'+data[i].OID+'">'+data[i].OID+'</td><td class="cell100 column2">'+data[i].PrescriptionDate+'</td><td class="cell100 column2">'+data[i].PrescriptionDate+'</td><td class="cell100 column4" id='+i+'></td><td class="cell100 column4"></td><td class="cell100 column2"><?php echo e(Auth::user()->FirstName.' '. Auth::user()->LastName); ?></td><td class="cell100 column2"><a href="<?php echo e(route('editprescription',['modalroute' => 'newprescription'])); ?>" onclick="editprescription(this); return false;" style="cursor: pointer";><img src="images/edit.png" style="width: 20px; float: left; margin: 5px 2px;" title="Edit Prescription"></a><a href="<?php echo e(route('deleteprescription')); ?>" onclick="deleteitem(this); return false;" style="cursor: pointer";><img src="images/remove.png" style="width: 17px; float: left; margin: 5px 2px;" title="Delete Prescription"></a></td></tr>'
                            $("#encounterprescriptions tbody").append(markup);

                            var drugs='';
                            var drugsx = data[i].prescriptionitems;
                            for(var j=0;j<drugsx.length;j++){
                                //drugs +=drugsx[j].pidrug.DrugName+'<'+drugsx[j].pidrug.Dose+'>';
            
                                $('#encounterprescriptions #'+i).append(drugsx[j].pidrug.DrugName+'<'+drugsx[j].pidrug.Dose+'>, ');
                            }
                         
               
                        }

                        return;
                    });
                }

            });     
        }

    //Modal Close
        $('#mymodal').on('hidden.bs.modal', function () {
           $('#mymodal .modal-dialog').removeClass("modal-xl");
           $('#mymodal .modal-title').text('');
           $('#mymodal .modal-dialog').css("max-width",'');
           $('input').prop('readonly',false);
            $('select').prop('disabled',false).css({'background':''});
            $('textarea').prop('readonly',false).css('background','');
        });

        $('#mymodal2').on('hidden.bs.modal', function () {
           $('#mymodal2 .modal-dialog').removeClass("modal-xl");
           $('#mymodal2 .modal-title').text('');
           $('#mymodal2 .modal-dialog').css("max-width",'');
           $('input').prop('readonly',false);
            $('select').prop('disabled',false).css({'background':''});
            $('textarea').prop('readonly',false).css('background','');
        });

        $(document).on('show.bs.modal', '.modal', function (event) {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
            $(this).css('z-index', zIndex);
            setTimeout(function() {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);
        });

    //Load appointment modal
        $(document).on('click', '#scheduleappointment', function(e) {
            e.preventDefault();
            var href = $(this).attr("href");
            var url = new URL(href);
            var idcno = url.searchParams.get("idcno");
            var lname = url.searchParams.get("lname");
            var fname = url.searchParams.get("fname");
			var tdate = ( new Date() ).toLocaleDateString();

            if(idcno != null){
				$.ajax({
					type: 'get',
					url: '<?php echo e(url("checkapointment")); ?>',
					data:{'idcno':idcno},
					success: function(data)
					{
						if(data){
							console.log((new Date(data.ReturnDate) ).toLocaleDateString() > tdate);
							console.log((new Date(data.ReturnDate) ).toLocaleDateString());
							console.log(tdate);
							
							if((new Date(data.ReturnDate) ).toLocaleDateString() < tdate){
								$('#partial').load(href,function(){
									$('#mymodal').modal({show:true});
									$('.modal-title').text('Return Visit');
									$('#encounterpatientdetailstable').css('display','block');
									$('#patientname').text(lname+" "+fname);
									$('#patidcno').text(idcno);
									$('#patientidcno').val(idcno);
									return;
								});
							}
							else{
								toastr.error("Client already has a pending appointment");
								return;
							}
						}							
					},
				});


            }
            else{
                toastr.error("Please search for a patient before creating an appointment");
            }
        });

    //Load edit user modal
        $(document).on('click', '#edituser', function(e) {
            e.preventDefault();
            var href = $(this).attr("href");
            $('#partial').load(href,function(){
                $('#mymodal').modal({show:true});
                $('#mymodal').css('z-index', '9999');
                $('#mymodal .modal-title').text('Edit System User');
                return;
            });
        });

    //Update System User
        $(document).ready(function () {
            $('#partial').on('click', '#updateuser', function(e) {
                e.preventDefault();
                var form = new FormData(document.getElementById('msform'));
                $.ajax({
                    type: 'post',
                    url: '<?php echo e(route("updateuser")); ?>',
                    data: form,
                    processData: false,
                    contentType: false,
                    success: function()
                    {
                        $('#mymodal').modal('hide');
                        window.location = "<?php echo e(route('user-management')); ?>";
                        console.log('success');
                    },
                    error: function(){
                        $('#mymodal').modal('hide');
                        window.location = "<?php echo e(route('user-management')); ?>";
                        console.log('Error just');
                        
                    },
                });
            
            });
        });

	//load demographics modals
        // //Tribe Modal
        //     $(document).on('click', '#addtribe', function(e) {
        //         e.preventDefault();
        //         var href = $(this).attr("href");
        //         $('#partial').load(href,function(){
        //             $('#mymodal').modal({show:true});
        //             $('#mymodal').css('z-index', '9999');
        //             $('#mymodal .modal-title').text('Add New tribe');
        //             return;
        //         });
        //     });

        //     $('#mymodal').on('hidden.bs.modal', function () {
        //        $('#partial').text('');
        //      });

        //     $('#mymodal').on('click', '#savetribe', function() {
        //         //isValid();
        //         var name = $("input[name='tribename']").val();
        //         if(name ===""){
        //             $(".error").css("display", "block");
        //             $('.error').text("This field is required"); 
        //             return;
        //         }
        //         $.ajax({
        //             type: 'get',
        //             url: '<?php echo e(route("newtribe")); ?>',
        //             data: {'tribename':name},
        //             success: function(){
        //                 var dropdown = document.getElementById('tribe');
        //                 dropdown.length = 0;
        //                 $.ajax({
        //                     type: 'get',
        //                     url: '<?php echo e(route("gettribes")); ?>',
        //                     data: {},
        //                     success: function(data){
        //                         if(data.length>=1)
        //                         {   
        //                             let option;
        //                             let defaultOption = document.createElement('option');
        //                             defaultOption.text = 'Select Tribe';
        //                             dropdown.add(defaultOption);
        //                             dropdown.selectedIndex = 0;
                                    
        //                             for (var i = 0; i < data.length; i++){
        //                                 option = document.createElement('option');
        //                                 option.text = data[i].Name;
        //                                 option.value = data[i].OID;
        //                                 dropdown.add(option);
        //                             }
        //                         }
        //                         $('#mymodal').each(function(){
        //                             $(this).modal('hide');
        //                             $('#partial').text('');
        //                             $(".error").css("display", "none");
        //                             $('.error').text(""); 
        //                         });
                                                 
        //                     },
        //                     error: function(){
        //                         console.log('success');
        //                     },
        //                 });
        //             },
        //             error: function(){
        //                 console.log('Error');
        //             },
        //         });
        //     });

        // //Religion Modal
        //     $(document).on('click', '#addreligion', function(e) {
        //         e.preventDefault();
        //         var href = $(this).attr("href");
        //         $('#partial').load(href,function(){
        //             $('#mymodal').modal({show:true});
        //             $('#mymodal').css('z-index', '9999');
        //             $('#mymodal .modal-title').text('Add New Religion');
        //             return;
        //         });
        //     });

        //     $('#partial').on('click','#savereligion', function() {
        //       var name = $("input[name=religionname]").val();
        //       if(name ===""){
        //             $(".error").css("display", "block");
        //             $('.error').text("This field is required"); 
        //             return;
        //         }
        //       $.ajax({
        //                 type: 'get',
        //                 url: '<?php echo e(route("newreligion")); ?>',
        //                 data: {'religionname':name},
        //                 success: function(){
        //                     var dropdown = document.getElementById('religion');
        //                     dropdown.length = 0;
        //                     $.ajax({
        //                         type: 'get',
        //                         url: '<?php echo e(route("getreligions")); ?>',
        //                         data: {},
        //                         success: function(data){
        //                             if(data.length>=1)
        //                             {   
        //                                 let option;
        //                                 let defaultOption = document.createElement('option');
        //                                 defaultOption.text = 'Select Religion';
        //                                 dropdown.add(defaultOption);
        //                                 dropdown.selectedIndex = 0;
                                        
        //                                 for (var i = 0; i < data.length; i++){
        //                                     option = document.createElement('option');
        //                                     option.text = data[i].Name;
        //                                     option.value = data[i].OID;
        //                                     dropdown.add(option);
        //                                 }
        //                             }
        //                             $('#mymodal').each(function(){
        //                             $(this).modal('hide');
        //                             $('#partial').text('');
        //                             $(".error").css("display", "none");
        //                             $('.error').text(""); 
        //                         });                            
        //                         },
        //                         error: function(){
        //                             console.log('success');
        //                         },
        //                     });
        //                 },
        //                 error: function(){
        //                     console.log('Error');
        //                 },
        //             });
        //     });

        // //country Modal
        //     $("#msform").on('click', '#addcountry', function(e) {
        //         e.preventDefault();
        //         var href = $(this).attr("href");
        //         $('#partial').load(href,function(){
        //             $('#mymodal').modal({show:true});
        //             $('#mymodal').css('z-index', '9999');
        //             $('#mymodal .modal-title').text('Add New Country');
        //             return;
        //         });
        //     });

        //     $('#msform').on('click','#savecountry', function() {
        //       var name = $("input[name=countryname]").val();
        //       if(name ===""){
        //             $(".error").css("display", "block");
        //             $('.error').text("This field is required"); 
        //             return;
        //         }
        //       $.ajax({
        //                 type: 'get',
        //                 url: '<?php echo e(route("newcountry")); ?>',
        //                 data: {'countryname':name},
        //                 success: function(){
        //                     var dropdown = document.getElementById('country');
        //                     dropdown.length = 0;
        //                     $.ajax({
        //                         type: 'get',
        //                         url: '<?php echo e(route("getcountries")); ?>',
        //                         data: {},
        //                         success: function(data){
        //                             if(data.length>=1)
        //                             {   
        //                                 let option;
        //                                 let defaultOption = document.createElement('option');
        //                                 defaultOption.text = 'Select Country';
        //                                 dropdown.add(defaultOption);
        //                                 dropdown.selectedIndex = 0;
                                        
        //                                 for (var i = 0; i < data.length; i++){
        //                                     option = document.createElement('option');
        //                                     option.text = data[i].Name;
        //                                     option.value = data[i].OID;
        //                                     dropdown.add(option);
        //                                 }
        //                             }
        //                             $('#mymodal').each(function(){
        //                             $(this).modal('hide');
        //                             $('#partial').text('');
        //                             $(".error").css("display", "none");
        //                             $('.error').text(""); 
        //                         });                           
        //                         },
        //                         error: function(){
        //                             console.log('success');
        //                         },
        //                     });
        //                 },
        //                 error: function(){
        //                     console.log('Error');
        //                 },
        //             });
        //     });

        // //district Modal
        //     $(document).on('click', '#adddistrict', function(e) {
        //         e.preventDefault();
        //         var href = $(this).attr("href");
        //         $('#partial').load(href,function(){
        //             $('#mymodal').modal({show:true});
        //             $('#mymodal').css('z-index', '9999');
        //             $('.modal-title').text('Add New District');
        //             return;
        //         });
        //     });

        //     $(document).on('click','#savedistrict', function() {
        //       var name = $("input[name=districtname]").val();
        //       var country = $( "select[name=country] option:selected" ).val();
        //       if(name =="" || country ==""){
                
        //             $(".error").css("display", "block");
        //             $('.error').text("Please fill in all the fields"); 
        //             return;
        //         }

        //         $.ajax({
        //             type: 'get',
        //             url: '<?php echo e(route("newdistrict")); ?>',
        //             data: {'districtname':name,'country':country},
        //             success: function(){
        //                 var dropdown = document.getElementById('district');
        //                 dropdown.length = 0;
        //                 $.ajax({
        //                     type: 'get',
        //                     url: '<?php echo e(route("getdistricts")); ?>',
        //                     data: {'id':country},
        //                     success: function(data){
        //                         if(data.length>=1)
        //                         {   
        //                             let option;
        //                             let defaultOption = document.createElement('option');
        //                             defaultOption.text = 'Select District';
        //                             dropdown.add(defaultOption);
        //                             dropdown.selectedIndex = 0;
                                    
        //                             for (var i = 0; i < data.length; i++){
        //                                 option = document.createElement('option');
        //                                 option.text = data[i].Name;
        //                                 option.value = data[i].OID;
        //                                 dropdown.add(option);
        //                             }
        //                         }
        //                         $('#mymodal').each(function(){
        //                             $(this).modal('hide');
        //                             $('#partial').text('');
        //                             $(".error").css("display", "none");
        //                             $('.error').text(""); 
        //                         });                             
        //                     },
        //                     error: function(){
        //                         console.log('success');
        //                     },
        //                 });
        //             },
        //             error: function(){
        //                 console.log('Error');
        //             },
        //         });
        //     });

        // //county Modal
        //     $(document).on('click', '#addcounty', function(e) {
        //         e.preventDefault();
        //         var href = $(this).attr("href");
        //         $('#partial').load(href,function(){
        //             $('#mymodal').modal({show:true});
        //             $('#mymodal').css('z-index', '9999');
        //             $('.modal-title').text('Add New County');
        //             return;
        //         });
        //     });

        //     $('#partial').on('click','#savecounty', function() {
        //          var name = $("input[name=countyname]").val();
        //          var district = $( "select[name=district] option:selected" ).val();
        //         if(name =="" || district==""){

        //             $(".error").css("display", "block");
        //             $('.error').text("Please fill in all the fields");
        //             return;
        //         }
        //         $.ajax({
        //             type: 'get',
        //             url: '<?php echo e(route("newcounty")); ?>',
        //             data: {'countyname':name,'district':district},
        //             success: function(){
        //                 var dropdown = document.getElementById('county');
        //                 dropdown.length = 0;
        //                 $.ajax({
        //                     type: 'get',
        //                     url: '<?php echo e(route("getcounties")); ?>',
        //                     data: {'id':district},
        //                     success: function(data){
        //                         if(data.length>=1)
        //                         {   
        //                             let option;
        //                             let defaultOption = document.createElement('option');
        //                             defaultOption.text = 'Select County';
        //                             dropdown.add(defaultOption);
        //                             dropdown.selectedIndex = 0;
                                    
        //                             for (var i = 0; i < data.length; i++){
        //                                 option = document.createElement('option');
        //                                 option.text = data[i].Name;
        //                                 option.value = data[i].OID;
        //                                 dropdown.add(option);
        //                             }
        //                         }
        //                         $('#mymodal').each(function(){
        //                             $(this).modal('hide');
        //                             $('#partial').text('');
        //                             $(".error").css("display", "none");
        //                             $('.error').text(""); 
        //                         });                            
        //                     },
        //                     error: function(){
        //                         console.log('success');
        //                     },
        //                 });
        //             },
        //             error: function(){
        //                 console.log('Error');
        //             },
        //         });
        //     });

        // //subcounty Modal
        //     $(document).on('click', '#addsubcounty', function(e) {
        //         e.preventDefault();
        //         var href = $(this).attr("href");
        //         $('#partial').load(href,function(){
        //             $('#mymodal').modal({show:true});
        //             $('#mymodal').css('z-index', '9999');
        //             $('.modal-title').text('Add New Subcounty');
        //             return;
        //         });
        //     });

        //     $('#partial').on('click','#savesubcounty', function() {
        //       var name = $("input[name=subcountyname]").val();
        //       var county = $( "select[name=county] option:selected" ).val();
        //       if(name =="" || county ==""){
        //             $(".error").css("display", "block");
        //             $('.error').text("Please fill in all the fields"); 
        //             return;
        //         }
        //       $.ajax({
        //                 type: 'get',
        //                 url: '<?php echo e(route("newsubcounty")); ?>',
        //                 data: {'subcountyname':name,'county':county},
        //                 success: function(){
        //                     var dropdown = document.getElementById('subcounty');
        //                     dropdown.length = 0;
        //                     $.ajax({
        //                         type: 'get',
        //                         url: '<?php echo e(route("getsubcounties")); ?>',
        //                         data: {'id':county},
        //                         success: function(data){
        //                             if(data.length>=1)
        //                             {   
        //                                 let option;
        //                                 let defaultOption = document.createElement('option');
        //                                 defaultOption.text = 'Select Subcounty';
        //                                 dropdown.add(defaultOption);
        //                                 dropdown.selectedIndex = 0;
                                        
        //                             for (var i = 0; i < data.length; i++){
        //                                 option = document.createElement('option');
        //                                 option.text = data[i].Name;
        //                                 option.value = data[i].OID;
        //                                 dropdown.add(option);
        //                             }
        //                         }
        //                         $('#mymodal').each(function(){
        //                             $(this).modal('hide');
        //                             $('#partial').text('');
        //                             $(".error").css("display", "none");
        //                             $('.error').text(""); 
        //                         });                             
        //                     },
        //                     error: function(){
        //                         console.log('success');
        //                     },
        //                 });
        //             },
        //             error: function(){
        //                 console.log('Error');
        //             },
        //         });
        //     });                 

        // //Parish Modal
        //     $(document).on('click', '#addparish', function(e) {
        //         e.preventDefault();
        //         var href = $(this).attr("href");
        //         $('#partial').load(href,function(){
        //             $('#mymodal').modal({show:true});
        //             $('#mymodal').css('z-index', '9999');
        //             $('.modal-title').text('Add New Parish');
        //             return;
        //         });
        //     });

        //     $('#partial').on('click','#saveparish', function() {
        //       var name = $("input[name=parishname]").val();
        //       var subcounty = $( "select[name=subcounty] option:selected" ).val();
        //       if(name =="" || subcounty ==""){
        //             $(".error").css("display", "block");
        //             $('.error').text("Please fill in all the fields");
        //             return;
        //         }
        //       $.ajax({
        //                 type: 'get',
        //                 url: '<?php echo e(route("newparish")); ?>',
        //                 data: {'parishname':name,'subcounty':subcounty},
        //                 success: function(){
        //                     var dropdown = document.getElementById('parish');
        //                     dropdown.length = 0;
        //                     $.ajax({
        //                         type: 'get',
        //                         url: '<?php echo e(route("getparishes")); ?>',
        //                         data: {'id':subcounty},
        //                         success: function(data){
        //                             if(data.length>=1)
        //                             {   
        //                                 let option;
        //                                 let defaultOption = document.createElement('option');
        //                                 defaultOption.text = 'Select Parish';
        //                                 dropdown.add(defaultOption);
        //                                 dropdown.selectedIndex = 0;
                                        
        //                                 for (var i = 0; i < data.length; i++){
        //                                     option = document.createElement('option');
        //                                     option.text = data[i].Name;
        //                                     option.value = data[i].OID;
        //                                     dropdown.add(option);
        //                                 }
        //                             }
        //                             $('#mymodal').each(function(){
        //                                 $(this).modal('hide');
        //                                 $('#partial').text('');
        //                                 $(".error").css("display", "none");
        //                                 $('.error').text(""); 
        //                             });                             
        //                         },
        //                         error: function(){
        //                             console.log('success');
        //                         },
        //                     });
        //                 },
        //                 error: function(){
        //                     console.log('Error');
        //                 },
        //             });
        //     });

        // //village Modal
        //     $(document).on('click', '#addvillage', function(e) {
        //         e.preventDefault();
        //         var href = $(this).attr("href");
        //         $('#partial').load(href,function(){
        //             $('#mymodal').modal({show:true});
        //             $('#mymodal').css('z-index', '9999');
        //             $('.modal-title').text('Add New Village');
        //             return;
        //         });
        //     });

        //     $('#partial').on('click','#savevillage', function() {
        //       var name = $("input[name=villagename]").val();
        //       var parish = $( "select[name=parish] option:selected" ).val();
        //       if(name =="" || parish ==""){
        //             $(".error").css("display", "block");
        //             $('.error').text("Please fill in all the fields");
        //             return;
        //         }
        //       $.ajax({
        //                 type: 'get',
        //                 url: '<?php echo e(route("newvillage")); ?>',
        //                 data: {'villagename':name,'parish':parish},
        //                 success: function(){
        //                     var dropdown = document.getElementById('village');
        //                     dropdown.length = 0;
        //                     $.ajax({
        //                         type: 'get',
        //                         url: '<?php echo e(route("getvillages")); ?>',
        //                         data: {'id':parish},
        //                         success: function(data){
        //                             if(data.length>=1)
        //                             {   
        //                                 let option;
        //                                 let defaultOption = document.createElement('option');
        //                                 defaultOption.text = 'Select Parish';
        //                                 dropdown.add(defaultOption);
        //                                 dropdown.selectedIndex = 0;
                                        
        //                                 for (var i = 0; i < data.length; i++){
        //                                     option = document.createElement('option');
        //                                     option.text = data[i].Name;
        //                                     option.value = data[i].OID;
        //                                     dropdown.add(option);
        //                                 }
        //                             }
        //                             $('#mymodal').each(function(){
        //                                 $(this).modal('hide');
        //                                 $('#partial').text('');
        //                                 $(".error").css("display", "none");
        //                                 $('.error').text(""); 
        //                             });                        
        //                         },
        //                         error: function(){
        //                             console.log('success');
        //                         },
        //                     });
        //                 },
        //                 error: function(){
        //                     console.log('Error');
        //                 },
        //             });
        //     });

    //autofocus
        $('.modal').on('shown.bs.modal', function() {
            $(this).find('[autofocus]').focus();
        });

    //load phone modal
        $('form').on('click', '#addphonebutton', function(e) {
            e.preventDefault();
            $('#phoneform').modal({show:true});
            $('#phoneform .modal-title').text('Add Client Phone');
            return;
        });

    //save client phone
        $('.phonesubmit').bind('click', function(e) {
            e.preventDefault() // prevents the form from being submitted
             // the custom submit action
        });

        $(document).ready(function () {
            $(document).on('click', '#savephone', function() {
                var phone = document.getElementById('phonenumber').value;
                var surname = document.getElementById('phonesurname').value;
                var firstname = document.getElementById('phonefirstname').value;
                var relationship = document.getElementById('relationship').value;
                var personalcontact = document.getElementById('personalcontact');
                var contactperson = document.getElementById('contactperson');
                var disclosedperson = document.getElementById('disclosedperson');
                var phonedescription = document.getElementById('phonedescription').value;
                var tamaphonenumber = document.getElementById('tamaphonenumber').value;
                var tamacategoty = document.getElementById('tamacategoty').value;

                var ispersonalcontact, isdisclosedperson, iscontactperson;
                var ispersonalcontact1, isdisclosedperson1, iscontactperson1;
                
                var phoneformat = /^\d{10}$/;

                if (phone === "")
                {   
                    $("#phoneerror").css("display", "block");
                    $('#phoneerror').text("Phone Enter a phone number"); 
                    return;
                }
                
                if(phone.match(phoneformat))
                { 
                    if(personalcontact.checked){ispersonalcontact ="1"; ispersonalcontact1="<input type='checkbox' checked disabled/>" }
                    else{   
                        ispersonalcontact ="0";
                        ispersonalcontact1="-"

                    }

                    if(disclosedperson.checked){ isdisclosedperson ="1"; isdisclosedperson1="<input type='checkbox' checked disabled/>"}
                    else{   
                        isdisclosedperson ="0";
                        isdisclosedperson1="-"
                    }

                    if(contactperson.checked){ iscontactperson ="1"; iscontactperson1="<input type='checkbox' checked disabled/>"}
                    else{   
                        iscontactperson ="0";
                        iscontactperson1="-"    }

                    $.ajax({
                        type: 'get',
                        url: '<?php echo e(route("savephone")); ?>',
                        data: {'phone':phone,'surname':surname,'firstname':firstname,'relationship':relationship,'contactperson':iscontactperson,'disclosedperson':isdisclosedperson,'phonedescription':phonedescription,'tamaphonenumber':tamaphonenumber,'tamacategoty':tamacategoty, 'personalcontact':ispersonalcontact},
                        success: function(data)
                        {   
                            $.ajax({
                                type: 'get',
                                url: '<?php echo e(route("getphone")); ?>',
                                data:{},
                                success: function(phones)
                                {                                           
                                    var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='phoneOID[]' value='" +phones.OID+"'>"+phone+"</td><td class='cell100 column1'>" + ispersonalcontact1 + "</td><td class='cell100 column2'>" + firstname +" "+ surname + "</td><td class='cell100 column1'>" + relationship +"</td><td class='cell100 column1'>" + iscontactperson1 +"</td><td class='cell100 column1'>" + isdisclosedperson1 +"</td><td class='cell100 column2'>" + phonedescription +"</td><td class='cell100 column3'><a id='removerow' onclick='removePhone(this)' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Remove Phone'></a></td></tr>";
                                    $(".phoneresults tbody").append(markup);
                                }

                            });

                            document.getElementById('phonenumber').value='';
                            document.getElementById('tamaphonenumber').value='';
                            document.getElementById('tamacategoty').selectedIndex = 0;;
                            document.getElementById("phonefirstname").value = '';
                            document.getElementById('personalcontact').checked = false;
                            document.getElementById("phonesurname").value = '';
                            document.getElementById("relationship").value = '';
                            document.getElementById("contactperson").checked = false;
                            document.getElementById("disclosedperson").checked = false;
                            document.getElementById("phonedescription").value = '';

                            document.getElementById("phonefirstname").disabled = false;
                            document.getElementById("phonesurname").disabled = false;
                            document.getElementById("relationship").disabled = false;
                            document.getElementById("contactperson").disabled = false;
                            document.getElementById("disclosedperson").disabled = false;
                            document.getElementById("phonedescription").disabled = false;

                            $('#phoneerror').text("");
                            $("#phoneerror").css("display", "none");

                            $('#phoneform').modal('hide');

                        console.log('success');
                        },
                        error: function(){
                            console.log('Error');
                        },
                    });
                }
                else
                {
                    $("#phoneerror").css("display", "block");
                    $('#phoneerror').text("Phone should match format: 0789563172");
                    return; 
                }
                
            });
        });

    //phone form dynamics
        function disableMyText(){  
            if(document.getElementById("personalcontact").checked == true){ 
                //clear text
                document.getElementById("phonefirstname").value = '';
                document.getElementById("phonesurname").value = '';
                document.getElementById("relationship").value = '';
                document.getElementById("contactperson").checked = false;
                document.getElementById("disclosedperson").checked = false;
                document.getElementById("phonedescription").value = '';
                //disable
                document.getElementById("phonefirstname").disabled = true;
                document.getElementById("phonesurname").disabled = true;
                document.getElementById("relationship").disabled = true;
                document.getElementById("contactperson").disabled = true;
                document.getElementById("disclosedperson").disabled = true;
                document.getElementById("phonedescription").disabled = true;    
            }else{
               
                
                document.getElementById("phonefirstname").disabled = false;
                document.getElementById("phonesurname").disabled = false;
                document.getElementById("relationship").disabled = false;
                document.getElementById("contactperson").disabled = false;
                document.getElementById("disclosedperson").disabled = false;
                document.getElementById("phonedescription").disabled = false;
            }  
        } 

    //Load enrolment history modal
        $('#enrolmenthistory').on('click', function(e) {
            e.preventDefault();
            $('#enmymodal').modal({show:true});
        });

    //search form
        $('#searchform').on('keypress', function(e) {
          var keyCode = e.keyCode || e.which;
          if (keyCode === 13) { 
            e.preventDefault();
            search();
            return;
          }
        });

        $(document).ready(function () {
            $('#searchform').on('click', '#search', function() {
                search();
                return;
            });
        });

        function search(){
            var idcno = document.getElementById('patientsearch').value;
            $.ajax({
                type: 'get',
                url: '<?php echo e(route("clientsearch")); ?>',
                data: {'id':idcno},
                success: function(data){
                    if(data.length>=1)
                    {   
                        for (var i = 0; i < data.length; i++){
							
							//$('#home_image_preview_container').attr('src', 'uploads/1.jpg');
                            //variables
                            var gender = { 1:'Female', 2:'Male' };
                            var fstatus = { 1:'Active', 2:'Lost' };
                            var isprivate = { 1:'<input type="checkbox" checked readonly/>',null:'<input type="checkbox" readonly>'};
                            var marstatus = { 1:'Single', 2:'Married',3:'Cohabiting',4:'Separated',5:'Divorced',6:'Widowed' };
                            var visitorx = {1:'Self',2:'Relative',3:'Friend',4:'Home_Visitor',5:'Father',6:'Mother',7:'Sister',8:'Brother',9:'Son',10:'Daughter',11:'Spouse',12:'Call_Consultation',13:'Others'};
                            var visittype={1:'Normal General Clinic',2:'Urgent Review',3:'Private Clinic',4:'SRH CLinic-infants',5:'Tag Clinic',6:'Major Visit',7:'Continuous Adherence',8:'CCLAD',9:'Outbreak Preparedness'};
                            var phonesx = data[i].phones;
                            var encountersx = data[i].encounters;
                            var contact='';
                            //clear content
                            $('#home_idcno').text('');   
                            $('#home_name').text('');    
                            $('#home_religion').text('');    
                            $('#home_marital').text('');     
                            $('#home_regdate').text(''); 
                            $('#home_followup').text('');        
                            $('#home_dob').text('');     
                            $('#home_contact').text('');     
                            $('#home_gender').text('');  
                            $('#home_country').text(''); 
                            $('#home_hasid').text('');   
                            $('#home_district').text('');        
                            $('#home_tribe').text('');
                            $('#home_image_preview_container').attr('src', 'images/avatar.png');
                            $('#home_street').text('');  
                            $('#home_parish').text('');  
                            $('#home_subcounty').text('');   
                            $('#home_parish').text('');  
                            $('#home_village').text('');
                            $('#home_zone').text('');
                            $('#home_county').text(''); 
                            $('.error').text("");
                            $(".error").css("display", "none");

                            //clear triage content
                            $('#hometemp').text('');
                            $('#bp').text('');
                            $('#homeweight').text('');
                            $('#triagedate').text('')
                            $('#homeheight').text('');
                            $('#homemuac').text('');
                            $('#homebmi').text('').css('background-color','');

                            //set patient details for encounter form
                            var encounterhref = $("#newencounter").attr("href");
                            $("#newencounter").attr("href", "");
                            $("#newencounter").attr("href", "<?php echo e(route('encounter')); ?>?idcno="+data[i].IDCNO+"&fname="+data[i].FirstName+"&lname="+data[i].Surname+"&status_sp="+data[i].MaritalStatus);

                            //$("#scheduleappointment").attr("href", "<?php echo e(route('scheduleapointment')); ?>?idcno="+data[i].IDCNO+"&fname="+data[i].FirstName+"&lname="+data[i].Surname);

                            //New prescription link
                            $("#newprescription").attr("href", "");
                            $("#newprescription").attr("href", "<?php echo e(route('newprescription')); ?>?idcno="+data[i].IDCNO+"&fname="+data[i].FirstName+"&lname="+data[i].Surname);

                            //New Lab requisition link
                            $("#newlabrequisition").attr("href", "");
                            $("#newlabrequisition").attr("href", "<?php echo e(route('labrequisitionform')); ?>?idcno="+data[i].IDCNO+"&fname="+data[i].FirstName+"&lname="+data[i].Surname);

                            $("#viewlabs").attr("href", "");
                            $("#viewlabs").attr("href", "<?php echo e(route('patientlabs')); ?>?idcno="+data[i].IDCNO+"&fname="+data[i].FirstName+"&lname="+data[i].Surname);

                            //Triage link
                            // $("#triageform").attr("href", "");
                            // $("#triageform").attr("href", "<?php echo e(route('triageform')); ?>?idcno="+data[i].IDCNO+"&fname="+data[i].FirstName+"&lname="+data[i].Surname+"&dob="+data[i].BirthDate);

                            //Flowsheets
                            $("#flowsheets").attr("href", "");
                            $("#flowsheets").attr("href", "<?php echo e(route('flowsheets')); ?>?idcno="+data[i].IDCNO+"&fname="+data[i].FirstName+"&lname="+data[i].Surname+"&dob="+data[i].BirthDate);

                            //apppintments
                            $("#scheduleappointment").attr("href", "");
                            $("#scheduleappointment").attr("href", "<?php echo e(route('scheduleapointment')); ?>?idcno="+data[i].IDCNO+"&fname="+data[i].FirstName+"&lname="+data[i].Surname+"&dob="+data[i].BirthDate);

                            //enrolment history link
                            $("#enrolmenthistory").attr("href", "");
                            $("#enrolmenthistory").attr("href", "<?php echo e(route('enrolmenthistory')); ?>?idcno="+data[i].IDCNO);

                            $("input[name='patientidcno']").val(data[i].IDCNO);
                            $('#patientname').text(data[i].FirstName +" "+data[i].Surname); 
                            $('#patidcno').text(data[i].IDCNO); 
                            $('#encounterpatientdetailstable').css('display','block');
							
                            //Set Home content
                            try{
                                $('#home_idcno').text(data[i].IDCNO);
                                $('#home_name').text(data[i].FirstName +" "+data[i].Surname);        
                                $('#home_marital').text(marstatus[data[i].MaritalStatus]);
                                $('#home_regdate').text(dateFormat(data[i].RegistrationDate));   
                                $('#home_followup').text(fstatus[data[i].FollowUpStatus]);       
                                $('#home_dob').text(dateFormat(data[i].BirthDate));                                  
                                $('#home_gender').text(gender[data[i].Gender]);
								$('#home_hasid').text('');  
								$('#home_zone').text(data[i].Zone);
                                $('#home_street').text(data[i].Street);  
								
								if(data[i]._religion!==null){
									$('#home_religion').text(data[i]._religion.Name); 
								}
								if(data[i].countryy!==null){
									$('#home_country').text(data[i].countryy.Name); 
								}
								if(data[i]._district!==null){
									$('#home_district').text(data[i]._district.Name);  
								}
								if(data[i]._tribe!==null){
									$('#home_tribe').text(data[i]._tribe.Name);
								}
								if(data[i]._parish!==null){
									$('#home_parish').text(data[i]._parish.Name); 
								}
								if(data[i]._subcounty!==null){
									$('#home_subcounty').text(data[i]._subcounty.Name);  
								}
								if(data[i]._parish!==null){
									$('#home_parish').text(data[i]._parish.Name);
								}
								if(data[i]._village!==null){
									$('#home_village').text(data[i]._village.Name); 
								}
								if(data[i]._county!==null){
									$('#home_county').text(data[i]._county.Name);
								}	
                                if(data[i]._filedata!==null){
									$('img#home_image_preview_container').attr('src', '/'+data[i]._filedata.FileName+'?v='+Math.random(3));
								}
								
                                for (var i = 0; i<phonesx.length; i++){                             
                                    contact+=phonesx[i].PhoneNumber+",   ";
                                }
                                $('#home_contact').text(contact);
                                
                            }
                            catch{}
                            //client actions, delete, edit
                                $('#patientactions').text('');
                                var patientdelete = '<a href="<?php echo e(route('deleteclient')); ?>" onclick="deleteClient(this); return false;" style="cursor: pointer;" id="deleteclient"><img src="images/remove.png" style="width: 18px; margin: 5px 2px; margin-top: -1px;" title="Delete Client"> Delete Client</a>';

                                var patientedit = '<a href="<?php echo e(route('clientsearch',['modalroute' => 'newclientform'])); ?>"  style="cursor: pointer;" id="editclient"><img src="images/edit.png" style="width: 18px; margin: 5px 2px; margin-top: -1px;" title="Edit Client" /> Edit Client</a>';

                                $('#patientactions').append(patientedit +' | '+ patientdelete);
                            
                            //Populate encounter table
                            var table = document.getElementById("patientencounters");
                            var count = $('#patientencounters tr').length;
                            if(count >=1){
                               for(var i = table.rows.length - 1; i > 0; i--){
                                table.deleteRow(i);
                                } 
                            }
                            for(var i = 0; i<encountersx.length; i++){
                                //pick visit reasons
                                var visitreasons='';
                                var visitreasonx = encountersx[i].encounterreason;
                                //var id = encountersx[i].OID;
                                var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1' style='width: 8%;'><input type='hidden' name='itemid[]' value='" +encountersx[i].OID+"'>" + dateFormat(encountersx[i].visitDate) + "</td><td class='cell100 column1'>---</td><td class='cell100 column1' style='width: 8%;'>---</td><td class='cell100 column1'style='width: 5%;'>"+ isprivate[encountersx[i].IsPrivate] +"</td><td class='cell100 column1'>"+visittype[encountersx[i].VisitType]+"</td><td class='cell100 column1' id="+i+"></td><td class='cell100 column1' style='width: 5%;'>"+ visitorx[encountersx[i].Visitor] +"</td><td class='cell100 column1' style='width: 5%;'><a href='<?php echo e(route("prescriptions")); ?>' onclick='prescriptions(this); return false;' style='cursor: pointer';><img src='images/rx.png' style='width: 15px; float: left; margin: 5px 2px;' title='Prescriptions'></a></a></td><td class='cell100 column1' style='width: 5%;'><a href='<?php echo e(route("editencounterform",["modalroute" => "encounter"])); ?>' onclick='edititem(this); return false;' style='cursor: pointer';><img src='images/edit.png' style='width: 20px; float: left; margin: 5px 2px;' title='Edit Encounter'></a><a href='<?php echo e(route("deleteencounter")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 17px; float: left; margin: 5px 2px;' title='Delete Encounter'></a> </td></tr>";
                                $("#encounters table tbody").append(markup);
  
                                for(var j=0;j<visitreasonx.length;j++){
                                    visitreasons +=visitreasonx[j].Name+',   ';
                                    $('#encounters #'+i).append(visitreasonx[j].Name+',   ');
                                }
                                
                                   //break; 
                             
                                
                            }
                        }
						
						const chart = new Highcharts.Chart({
							chart: {
								renderTo: 'chart1',
								type: 'column',
								options3d: {
									enabled: true,
									alpha: 4,
									beta: 360,
									depth: 66,
									viewDistance: 25
								}
							},
							title: {
								text: 'Client CD4 Chart'
							},
							subtitle: {
								text: ''
							},
							xAxis: {
								categories: ['01-Jan-2020', '01-March-2020', '01-May-2020', '01-July-2020', '01-September-2020'],
								title: {
									text: null
								}
							},
							yAxis: {
								min: 0,
								title: {
									text: 'CD4 Count',
									align: null
								},
								labels: {
									overflow: 'justify'
								}
							},
							plotOptions: {
								column: {
									depth: 30,
									dataLabels: {
										enabled: true
									}
								}
							},
							credits: {
								enabled: false
							},
							series: [{
								name: 'CD4 Absolute',
								data: [94,105,120,210,400],
								color:'#af60bf'
							},
							{
								name: 'CD4 Percent',
								data: [10, 20, 30, 40, 60],
								color:'#d6a231'
							},
							{
								name: 'CD4 and RNAPCR',
								data: [29.9, 71.5, 106.4, 129.2, 144.0],
								color:'#31add6'
							}
							]
						});

                    }
                    else{
                        $('.error').css("display", "block");
                        $('.error').text('IDC Number doesnt match any client');
                         $('#home_idcno').text('');   
                        $('#home_name').text('');    
                        $('#home_religion').text('');    
                        $('#home_marital').text('');     
                        $('#home_regdate').text(''); 
                        $('#home_followup').text('');        
                        $('#home_dob').text('');     
                        $('#home_contact').text('');     
                        $('#home_gender').text('');  
                        $('#home_country').text(''); 
                        $('#home_hasid').text('');   
                        $('#home_district').text('');        
                        $('#home_tribe').text('');
                        $('#home_image_preview_container').attr('src', 'images/avatar.png');
                        $('#home_street').text('');  
                        $('#home_parish').text('');  
                        $('#home_subcounty').text('');   
                        $('#home_parish').text('');  
                        $('#home_village').text('');
                        $('#home_zone').text('');
                        $('#home_county').text('');

                        var table = document.getElementById("patientencounters");
                        var count = $('#patientencounters tr').length;
                        if(count >=1){
                            for(var i = table.rows.length - 1; i > 0; i--){
                            table.deleteRow(i);
                            } 
                        }
                    }                               
                },
                error: function(){
                    console.log('success');
                },
            });
        }

    //date format function
        function dateFormat(datevalue){
            var date = new Date(datevalue),
            month = '' + (date.getMonth() + 1),
            day = '' + date.getDate(),
            year = date.getFullYear();

            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;

            return [day, month, year].join('-');
            // var month = ((date.getMonth().length+1) === 1)? (date.getMonth()+1) : '0' + (date.getMonth()+1);

            // return date.getDate() + "/" + date.getMonth() + "/" + date.getFullYear();
        }

    //disable browser context menu
        $(document).ready(function()
        { 
            $(document).bind("contextmenu",function(e){
                return false;
            }); 
        })

    //Check Idle time and logout
        var time = new Date().getTime();
        $(document.body).bind("mousemove keypress mousedown click scroll touchstart", function(e) {
            time = new Date().getTime();
        });

        function refresh() {
            if(new Date().getTime() - time >= 3600000) 
                //window.location.reload(true);
                window.location = "<?php echo e(route('logout', ['session' => '1'])); ?>"; //passion url parameter
            else 
                setTimeout(refresh, 1000);
        }

         setTimeout(refresh, 1000);

    //delete items
        function deleteitem(r)
        {       
                if(confirm("Are you sure you want to delete?")){
                    r.parentNode.parentNode.remove();
                    var href = r.getAttribute("href");
                    // alert(href);
                    var id = r.parentNode.parentNode.getElementsByTagName('input')[0].value;
                    $.ajax({
                        type: 'get',
                        url: href,
                        data:{'id':id},
                        success: function(data)
                        {                                           
                            
                        }

                    }); 
                }
                
        }

    //Load Encounter modal
        $(document).on('click', '#newencounter', function(e) {
            e.preventDefault();
            var href = $(this).attr("href");
            var url = new URL(href);
            var idcno = url.searchParams.get("idcno");
            var lname = url.searchParams.get("lname");
            var fname = url.searchParams.get("fname");
            var marstatus = url.searchParams.get("status_sp");
            if(idcno != null){
                $('#partial').load(href,function(){
                    $('#mymodal').modal({show:true});
                    $('.modal-title').text('Client Visit');
                    $('#encounterpatientdetailstable').css('display','block');
                    $('#patientname').text(lname+" "+fname);
                    $('#patidcno').text(idcno);
                    $('#patientidcno').val(idcno);
                    if(marstatus == '1'){
                        $('#visitor option[value=11]').remove();
                    }
                    return;
                });

            }
            else{
                toastr.error("Please search for a patient before creating an encounter");
            }
            
        });

    //edit encounter modal
        function edititem(r)
        {       
            var href = r.getAttribute("href");
            var url = new URL(href);
            var formurl = url.searchParams.get("modalroute");
            // var marstatus = url.searchParams.get("status_sp");
            ///alert(formurl);
            var id = r.parentNode.parentNode.getElementsByTagName('input')[0].value;
            $.ajax({
                type: 'get',
                url: href,
                data:{'id':id},
                success: function(data)
                {                                           
                    $('#partial').load(formurl+' #msform',function(){
                        $('#mymodal').modal({show:true});
                        $('.modal-title').text('Edit Visit');
                        $('#encounterpatientdetailstable').css('display','block');
                        $('legend').css('display', 'none');
                        $('form').attr('action', '<?php echo e(route("updateencounter")); ?>');
                        $("input[name='encountersubmit']").val('Save');
                        $("input[name='encountersubmit']").attr('id','editencounter');

                        for (var i = 0; i < data.length; i++){
                            $("input[name='patientidcno']").val(data[i]._patient.IDCNO);
                            $('#patientname').text(data[i]._patient.FirstName +" "+data[i]._patient.Surname); 
                            $('#patidcno').text(data[i]._patient.IDCNO);

                            $('#encounterreason').val(data[i].encounterreason.OID); 
                            $('#visitor').val(data[i].Visitor); 
                            $('#visittype').val(data[i].VisitType);
                            $('#visitdate').val(data[i].visitDate);
                            // if(marstatus == '1'){
                            //     $('#visitor option[value=11]').remove();
                            // }
                            //apend encounter id to form
                            var encounterid = '<input type="hidden" name="encounterid" id="encounterid" value="'+data[i].OID+'"/>';
                            $('#msform').append(encounterid);
                            //representation reason
                            //set is private
                            if(data[i].Visitor==1){
                                $('#representationreason').prop("disabled", true);
                            }
                            else{
                                $('#representationreason').val(data[i].RepresentationReason); 
                            }
                            //set is private
                            if(data[i].IsPrivate=="1"){
                                $('#isprivate').prop("checked", true);
                            }

                            //Set Reasons
                            var reasons = data[i].encounterreason;
                            for(var i=0;i<reasons.length;i++){
                                $("input[type='checkbox'][value='"+ reasons[i].OID +"']").prop("checked", true);
                            }
                        }

                        return;
                    });

                }

            });
        } 

    //Save new Encounter
        $(document).ready(function () {
            $('#partial').on('click', '#recordencounter', function() {
                var form = new FormData(document.getElementById('msform'));
                var encounterhref = document.getElementById('newencounter').getAttribute('href');
                var url = new URL(encounterhref);
                var encounteridcno = url.searchParams.get("idcno");

                $.ajax({
                    type: 'post',
                    url: '<?php echo e(route("createencounter")); ?>',
                    data: form,
                    processData: false,
                    contentType: false,
                    success: function(result)
                    {   
                        $.ajax({
                            type: 'get',
                            url: '<?php echo e(route("getallpatientencounters")); ?>',
                            data:{'id':encounteridcno},
                            success: function(data)
                            {   
                                if(data.length>=1)
                                {   
                                    for (var i = 0; i < data.length; i++){
                                        var visitorx = {1:'Self',2:'Relative',3:'Friend',4:'Home_Visitor',5:'Father',6:'Mother',7:'Sister',8:'Brother',9:'Son',10:'Daughter',11:'Spouse',12:'Call_Consultation',13:'Others'};
                                        var encountersx = data[i].encounters;
                                        var visittype={1:'Normal General Clinic',2:'Urgent Review',3:'Private Clinic',4:'SRH CLinic-infants',5:'Tag Clinic',6:'Major Visit',7:'Continuous Adherence',8:'CCLAD',9:'Outbreak Preparedness'};
                                        var isprivate = { 1:'<input type="checkbox" checked readonly/>',null:'<input type="checkbox" readonly>'};

                                        //Populate encounter table
                                        var table = document.getElementById("patientencounters");
                                        var count = $('#patientencounters tr').length;
                                        if(count >=1){
                                           for(var i = table.rows.length - 1; i > 0; i--){
                                            table.deleteRow(i);
                                            } 
                                            for(var i = 0; i<encountersx.length; i++){
                                                //pick visit reasons
                                                var visitreasons='';
                                                var visitreasonx = encountersx[i].encounterreason;

                                                var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1' style='width: 8%;'><input type='hidden' name='itemid[]' value='" +encountersx[i].OID+"'>" + dateFormat(encountersx[i].visitDate) + "</td><td class='cell100 column1'>---</td><td class='cell100 column1' style='width: 8%;'>---</td><td class='cell100 column1'style='width: 5%;'>"+ isprivate[encountersx[i].IsPrivate] +"</td><td class='cell100 column1'>"+visittype[encountersx[i].VisitType]+"</td><td class='cell100 column1' id="+i+"></td><td class='cell100 column1' style='width: 5%;'>"+ visitorx[encountersx[i].Visitor] +"</td><td class='cell100 column1' style='width: 5%;'><a href='<?php echo e(route("prescriptions")); ?>' onclick='prescriptions(this); return false;' style='cursor: pointer';><img src='images/rx.png' style='width: 15px; float: left; margin: 5px 2px;' title='Prescriptions'></a></td><td class='cell100 column1' style='width: 5%;'><a href='<?php echo e(route("editencounterform",["modalroute" => "encounter"])); ?>' onclick='edititem(this); return false;' style='cursor: pointer';><img src='images/edit.png' style='width: 20px; float: left; margin: 5px 2px;' title='Edit Encounter'></a><a href='<?php echo e(route("deleteencounter")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 17px; float: left; margin: 5px 2px;' title='Delete Encounter'></a> </td></tr>";

                                                $("#encounters table tbody").append(markup);

                                                for(var j=0;j<visitreasonx.length;j++){
                                                    visitreasons +=visitreasonx[j].Name+',   ';
                                                    $('#'+i).append(visitreasonx[j].Name+',   ');
                                                }
                                
                                            }
                                        }
                                    }
                                }
                            }
                        });

                        $('.modal').each(function(){
                            $(this).modal('hide');
                        });
                    console.log('success');
                    },
                    error: function(){
                        console.log('Error');
                    },
                });
            
            });
        });

    //Update encounter
        $(document).ready(function () {
            $('#partial').on('click', '#editencounter', function() {
                var form = new FormData(document.getElementById('msform'));
                var encounterhref = document.getElementById('newencounter').getAttribute('href');
                var url = new URL(encounterhref);
                var encounteridcno = url.searchParams.get("idcno");

                $.ajax({
                    type: 'post',
                    url: '<?php echo e(route("updateencounter")); ?>',
                    data: form,
                    processData: false,
                    contentType: false,
                    success: function(result)
                    {   
                        $.ajax({
                            type: 'get',
                            url: '<?php echo e(route("getallpatientencounters")); ?>',
                            data:{'id':encounteridcno},
                            success: function(data)
                            {   
                                if(data.length>=1)
                                {   
                                    for (var i = 0; i < data.length; i++){
                                        var visitorx = {1:'Self',2:'Relative',3:'Friend',4:'Home_Visitor',5:'Father',6:'Mother',7:'Sister',8:'Brother',9:'Son',10:'Daughter',11:'Spouse',12:'Call_Consultation',13:'Others'};
                                        var isprivate = { 1:'<input type="checkbox" checked readonly/>',null:'<input type="checkbox" readonly>'};
                                        var visittype={1:'Normal General Clinic',2:'Urgent Review',3:'Private Clinic',4:'SRH CLinic-infants',5:'Tag Clinic',6:'Major Visit',7:'Continuous Adherence',8:'CCLAD',9:'Outbreak Preparedness'};
                                        var encountersx = data[i].encounters;

                                        //Populate encounter table
                                        var table = document.getElementById("patientencounters");
                                        var count = $('#patientencounters tr').length;
                                        if(count >=1){
                                           for(var i = table.rows.length - 1; i > 0; i--){
                                            table.deleteRow(i);
                                            } 
                                        }
                                        for(var i = 0; i<encountersx.length; i++){
                                            //pick visit reasons
                                            var visitreasons='';
                                            var visitreasonx = encountersx[i].encounterreason;

                                            var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1' style='width: 8%;'><input type='hidden' name='itemid[]' value='" +encountersx[i].OID+"'>" + dateFormat(encountersx[i].visitDate) + "</td><td class='cell100 column1'>---</td><td class='cell100 column1' style='width: 8%;'>---</td><td class='cell100 column1'style='width: 5%;'>"+ isprivate[encountersx[i].IsPrivate] +"</td><td class='cell100 column1'>"+visittype[encountersx[i].VisitType]+"</td><td class='cell100 column1' id="+i+"></td><td class='cell100 column1' style='width: 5%;'>"+ visitorx[encountersx[i].Visitor] +"</td><td class='cell100 column1' style='width: 5%;'><a href='<?php echo e(route("prescriptions")); ?>' onclick='prescriptions(this); return false;' style='cursor: pointer';><img src='images/rx.png' style='width: 15px; float: left; margin: 5px 2px;' title='Prescriptions'></a></td><td class='cell100 column1' style='width: 5%;'><a href='<?php echo e(route("editencounterform",["modalroute" => "encounter"])); ?>' onclick='edititem(this); return false;' style='cursor: pointer';><img src='images/edit.png' style='width: 20px; float: left; margin: 5px 2px;' title='Edit Encounter'></a><a href='<?php echo e(route("deleteencounter")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 17px; float: left; margin: 5px 2px;' title='Delete Encounter'></a> </td></tr>";

                                            $("#encounters table tbody").append(markup);

                                            for(var j=0;j<visitreasonx.length;j++){
                                                visitreasons +=visitreasonx[j].Name+',   ';
                                                $('#'+i).append(visitreasonx[j].Name+',   ');
                                            }
                                
                                        }
                                    }
                                }
                            }
                        });

                        $('.modal').each(function(){
                            $(this).modal('hide');
                        });
                    console.log('success');
                    },
                    error: function(){
                        console.log('Error');
                    },
                });
            
            });
        });
    
    //form dynamics
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
                
                $('input[name="returndate"]').attr('min', [year, month, day].join('-'));
                $('input[name="visitdate"]').val([year, month, day].join('-'));
            });

        //other visit
            $(document).ready(function () {
                $(document).on('change', '#visitor', function() {
                    var visitor = $( "#visitor option:selected" ).text();
                    if(visitor =='Other'){
                        $("#othervisitor").attr("type", "text");
                        $("#othervisitor").attr("required", true);
                    }
                    else{
                        $("#othervisitor").attr("type", "hidden");
                        $("#othervisitor").attr("required", false);
                    }
                    
                });
            });  

        //representation reason disable/enable
            $(document).ready(function () {
                $(document).on('change', '#visitor', function() {
                    var visitor = $( "#visitor option:selected" ).text();
                    if(visitor =='Self'){
                        $("#representationreason").attr("disabled", "disabled");
                        $("#representationreason").attr("required", false);
                    }
                    else{
                        $("#representationreason").attr("disabled", false);
                        $("#representationreason").attr("required", true);
                    }
                    
                });
            });

        //other representation reason
            $(document).ready(function () {
                $(document).on('change', '#representationreason', function() {
                    var reason = $( "#representationreason option:selected" ).text();
                    if(reason =='Other'){
                        $("#otherrepreason").attr("type", "text");
                        $("#otherrepreason").attr("required", true);
                    }
                    else{
                        $("#otherrepreason").attr("type", "hidden");
                        $("#otherrepreason").attr("required", false);
                    }
                    
                });
            });  

        //other visit type
            $(document).ready(function () {
                $(document).on('change', '#visittype', function() {
                    var reason = $( "#visittype option:selected" ).text();
                    if(reason =='Other'){
                        $("#othervisittype").attr("type", "text");
                        $("#othervisittype").attr("required", true);
                    }
                    else{
                        $("#othervisittype").attr("type", "hidden");
                        $("#othervisittype").attr("required", false);
                    }
                    
                });
            });

    //new patient modal
        $(document).on('click', '#newclient', function(e) {
            e.preventDefault();
            var href = $(this).attr("href");
            $('#partial2').load(href,function(){
                $('#mymodal2').modal({show:true});
                $('#mymodal2 .modal-title').text('New Client');
                $('#mymodal2 .modal-dialog').addClass("modal-xl");
                return;
            });  
        });

    //edit patient modal
        $('table').on('click','#editclient', function(e) {
            e.preventDefault();
            var href = $(this).attr("href");
            var url = new URL(href);
            var formurl = url.searchParams.get("modalroute");
            var id = $("input[name='patientidcno']").val();

             $.ajax({
                type: 'get',
                url: href,
                data:{'id':id},
                success: function(data)
                {                                           
                    $('#partial2').load(formurl+' .detailsform',function(){
                        $('#mymodal2').modal({show:true});
                        $('#mymodal2 .modal-title').text('Edit Client');
                        $('#mymodal2 .modal-dialog').css('overflow-y','initial !important');
                        $('#mymodal2 .modal-body').css('height','500px');
                        $('#mymodal2 .modal-body').css('overflow-y','auto');
                        $('#mymodal2 .modal').css('display','block !important');
                        $('#mymodal2 .modal-dialog').addClass("modal-xl");
                        $('#encounterpatientdetailstable').css('display','block');
                        $('legend').css('display', 'none');
                        $(".submit").val('Edit Client');
                        $(".submit").attr('id','updateclient');
                    
                        for (var i = 0; i < data.length; i++){
                            var gender = { 1:'Female', 2:'Male' };
                            var fstatus = { 1:'Active', 2:'Lost' };
                            var marstatus = { 1:'Single', 2:'Married',3:'Cohabiting',4:'Separated',5:'Divorced',6:'Widowed' };
                            var visitorx = {1:'Self',2:'Relative',3:'Friend',4:'Home_Visitor',5:'Father',6:'Mother',7:'Sister',8:'Brother',9:'Son',10:'Daughter',11:'Spouse',12:'Call_Consultation',13:'Others'};
                            var phonesx = data[i].phones;
                            var encountersx = data[i].encounters;
                            var contact='';
                             $('.detailsform').append('<input type="hidden" name="idcno" value="'+ data[i].IDCNO +'">');
                             if(data[i]._filedata !=null){
                                $('.detailsform').append('<input type="hidden" name="imageid" value="'+ data[i]._filedata.OID +'">');
                             }
                             
                            //Set form content
                            try{
                                $("input[name='surname']").val(data[i].Surname);
                                $("input[name='firstname']").val(data[i].FirstName);
                                $("select[name='gender']").val(data[i].Gender);
                                $("input[name='dob']").val(data[i].BirthDate);
                                $("select[name='maritalstatus']").val(data[i].MaritalStatus);
                                $("select[name='tribe']").val(data[i]._tribe.OID);
                                $("select[name='religion']").val(data[i]._religion.OID);
                                $("input[name='zone']").val(data[i].Zone);
                                $("input[name='street']").val(data[i].Street);
                                $("input[name='landlord']").val(data[i].LandLord);  
                                $("input[name='prominentleader']").val(data[i].ProminentLeader);  
                                $("input[name='neighbour']").val(data[i].NeighbourFeature);  
                                $("input[name='commonname']").val(data[i].CommonName);  
                                $("input[name='otherIDIStaffIndentification']").val(data[i].OtherIDIStaffIndentification);
                                $("select[name='IDIStaffIndentification']").val(data[i].IDIStaffIndentification); 
                                $("select[name='visitingproblem']").val(data[i].ProblemWithVisting); 
                                $("textarea[name='detaileddirection']").val(data[i].DetailedDirection);

                                $("select[name='country']").val(data[i].countryy.OID);
                                $("select[name='district']").append('<option value="'+ data[i]._district.OID +'">'+ data[i]._district.Name+'</option>').val(data[i]._district.OID);
                                $("select[name='county']").append('<option value="'+ data[i]._county.OID +'">'+ data[i]._county.Name+'</option>').val(data[i]._county.OID);
                                $("select[name='subcounty']").append('<option value="'+ data[i]._subcounty.OID +'">'+ data[i]._subcounty.Name+'</option>').val(data[i]._subcounty.OID);
                                $("select[name='parish']").append('<option value="'+ data[i]._parish.OID +'">'+ data[i]._parish.Name+'</option>').val(data[i]._parish.OID);
                                $("select[name='village']").append('<option value="'+ data[i]._village.OID +'">'+ data[i]._village.Name+'</option>').val(data[i]._village.OID);

                                $('#image_preview_container').attr('src', data[i]._filedata.FileName);

                                //load contacts in table
                                for (var i = 0; i<phonesx.length; i++){                             
                                    var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='phoneOID[]' value='" +phonesx[i].OID+"'>"+phonesx[i].PhoneNumber+"</td><td class='cell100 column1'>" + phonesx[i].SelfContact + "</td><td class='cell100 column2'>" + phonesx[i].FirstName + "</td><td class='cell100 column1'>" + phonesx[i].Relationship +"</td><td class='cell100 column1'>" + phonesx[i].CanBeContacted +"</td><td class='cell100 column1'>" + phonesx[i].HaveDisclosed +"</td><td class='cell100 column2'>" + phonesx[i].Description +"</td><td class='cell100 column3'><a id='removerow' onclick='removePhone(this)' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Remove Phone'></a></td></tr>";
                                    $(".phoneresults tbody").append(markup);
                                }
                                
                            }
                            catch{} 
                           
                        }

                        return;
                    });

                    $('#mymodal2').on('hidden.bs.modal', function () {
                       $('#mymodal2 .modal-dialog').removeClass("modal-xl");
                       $('#mymodal2 .modal-title').text('');
                    });

                }

            });
        });
    
    //Update Client
        $(document).ready(function () {
            $('#partial2').on('click', '#updateclient', function(e) {
                e.preventDefault();
                var idcno = $('#home_idcno').text();
                var form = new FormData(document.getElementById('msform'));
                var patientimage = document.getElementById('patientimage').files[0];
                if (patientimage) {   
                    form.append('patientimage', patientimage);
                }

                $.ajax({
                    type: 'post',
                    url: '<?php echo e(route("updateclient")); ?>',
                    data: form,
                    processData: false,
                    contentType: false,
                    success: function(result)
                    {   
                        $.ajax({
                            type: 'get',
                            url: '<?php echo e(route("clientsearch")); ?>',
                            data: {'id':idcno},
                            success: function(data)
                            {   
                                if(data.length>=1)
                                {   
                                    for (var i = 0; i < data.length; i++){
                                        //variables
                                        var gender = { 1:'Female', 2:'Male' };
                                        var fstatus = { 1:'Active', 2:'Lost' };
                                        var marstatus = { 1:'Single', 2:'Married',3:'Cohabiting',4:'Separated',5:'Divorced',6:'Widowed' };
                                        var visitorx = {1:'Self',2:'Relative',3:'Friend',4:'Home_Visitor',5:'Father',6:'Mother',7:'Sister',8:'Brother',9:'Son',10:'Daughter',11:'Spouse',12:'Call_Consultation',13:'Others'};
                                        var phonesx = data[i].phones;
                                        var encountersx = data[i].encounters;
                                        var contact='';
                                        //clear content
                                        $('#home_idcno').text('');   
                                        $('#home_name').text('');    
                                        $('#home_religion').text('');    
                                        $('#home_marital').text('');     
                                        $('#home_regdate').text(''); 
                                        $('#home_followup').text('');        
                                        $('#home_dob').text('');     
                                        $('#home_contact').text('');     
                                        $('#home_gender').text('');  
                                        $('#home_country').text(''); 
                                        $('#home_hasid').text('');   
                                        $('#home_district').text('');        
                                        $('#home_tribe').text('');
                                        $('#home_image_preview_container').attr('src', 'images/avatar.png');
                                        $('#home_street').text('');  
                                        $('#home_parish').text('');  
                                        $('#home_subcounty').text('');   
                                        $('#home_parish').text('');  
                                        $('#home_village').text('');
                                        $('#home_zone').text('');
                                        $('#home_county').text(''); 
                                        $('.error').text("");
                                        $(".error").css("display", "none"); 

                                        //set patient details for Enrolment history
                                        $('#enrolmentidcno').text(data[i].IDCNO);
                                        $('#enrolmentname').text(data[i].FirstName +" "+data[i].Surname);
                                        $('#enrolmentrdate').text(dateFormat(data[i].RegistrationDate));
                                        $('#enrolmentfol').text(fstatus[data[i].FollowUpStatus]);

                                        //set patient details for encounter form
                                        var encounterhref = $("#newencounter").attr("href");
                                        $("#newencounter").attr("href", "");
                                        $("#newencounter").attr("href", "<?php echo e(route('encounter')); ?>?idcno="+data[i].IDCNO+"&fname="+data[i].FirstName+"&lname="+data[i].Surname+"&status_sp="+data[i].MaritalStatus);

                                        //$("#scheduleappointment").attr("href", "<?php echo e(route('scheduleapointment')); ?>?idcno="+data[i].IDCNO+"&fname="+data[i].FirstName+"&lname="+data[i].Surname);

                                        //New prescription link
                                        $("#newprescription").attr("href", "");
                                        $("#newprescription").attr("href", "<?php echo e(route('newprescription')); ?>?idcno="+data[i].IDCNO+"&fname="+data[i].FirstName+"&lname="+data[i].Surname);

                                        //New Lab requisition link
                                        $("#newlabrequisition").attr("href", "");
                                        $("#newlabrequisition").attr("href", "<?php echo e(route('labrequisitionform')); ?>?idcno="+data[i].IDCNO+"&fname="+data[i].FirstName+"&lname="+data[i].Surname);

                                        $("#viewlabs").attr("href", "");
                                        $("#viewlabs").attr("href", "<?php echo e(route('patientlabs')); ?>?idcno="+data[i].IDCNO+"&fname="+data[i].FirstName+"&lname="+data[i].Surname);

                                        //Triage link
                                        // $("#triageform").attr("href", "");
                                        // $("#triageform").attr("href", "<?php echo e(route('triageform')); ?>?idcno="+data[i].IDCNO+"&fname="+data[i].FirstName+"&lname="+data[i].Surname+"&dob="+data[i].BirthDate);

                                        //Flowsheets
                                        $("#flowsheets").attr("href", "");
                                        $("#flowsheets").attr("href", "<?php echo e(route('flowsheets')); ?>?idcno="+data[i].IDCNO+"&fname="+data[i].FirstName+"&lname="+data[i].Surname+"&dob="+data[i].BirthDate);

                                        //apppintments
                                        $("#scheduleappointment").attr("href", "");
                                        $("#scheduleappointment").attr("href", "<?php echo e(route('scheduleapointment')); ?>?idcno="+data[i].IDCNO+"&fname="+data[i].FirstName+"&lname="+data[i].Surname+"&dob="+data[i].BirthDate);

                                        //enrolment history link
                                        $("#enrolmenthistory").attr("href", "");
                                        $("#enrolmenthistory").attr("href", "<?php echo e(route('enrolmenthistory')); ?>?idcno="+data[i].IDCNO);

                                        $("input[name='patientidcno']").val(data[i].IDCNO);
                                        $('#patientname').text(data[i].FirstName +" "+data[i].Surname); 
                                        $('#patidcno').text(data[i].IDCNO); 
                                        $('#encounterpatientdetailstable').css('display','block');
                                        //Set Home content
                                        try{
                                            $('#home_idcno').text(data[i].IDCNO);
                                            $('#home_name').text(data[i].FirstName +" "+data[i].Surname);        
                                            $('#home_marital').text(marstatus[data[i].MaritalStatus]);
                                            $('#home_regdate').text(dateFormat(data[i].RegistrationDate));   
                                            $('#home_followup').text(fstatus[data[i].FollowUpStatus]);       
                                            $('#home_dob').text(dateFormat(data[i].BirthDate));                                  
                                            $('#home_gender').text(gender[data[i].Gender]);
                                            $('#home_religion').text(data[i]._religion.Name);    
                                            $('#home_country').text(data[i].countryy.Name);  
                                            $('#home_hasid').text('');   
                                            $('#home_district').text(data[i]._district.Name);        
                                            $('#home_tribe').text(data[i]._tribe.Name);  
                                            $('#home_zone').text(data[i].Zone);
                                            $('#home_street').text(data[i].Street);  
                                            $('#home_parish').text(data[i]._parish.Name);    
                                            $('#home_subcounty').text(data[i]._subcounty.Name);  
                                            $('#home_parish').text(data[i]._parish.Name);    
                                            $('#home_village').text(data[i]._village.Name); 
                                            $('#home_county').text(data[i]._county.Name);
                                            $('#home_image_preview_container').attr('src', data[i]._filedata.FileName+'?v='+Math.random(3));

                                            for (var i = 0; i<phonesx.length; i++){                             
                                                contact+=phonesx[i].PhoneNumber+",   ";
                                            }
                                            $('#home_contact').text(contact);
                                            
                                        }
                                        catch{}
                                   
                                    }
                                }
                            }
                        });

                        $('#mymodal2').modal('hide');
                    console.log('success');
                    },
                    error: function(fail){
                        //toastr.warning(fail.message.errors);
                        var err = eval("(" + fail.responseText + ")");
                        toastr.warning(err.errors.patientimage)
                        //alert();
                    },
                });
            
            });
        });

    //enrolment history
        $(document).on('click', '#enrolmenthistory', function(e) {
            e.preventDefault();
            var href = $(this).attr("href");
            var url = new URL(href);
            var idcno = url.searchParams.get("idcno");
            if(idcno != null){
                $('#partial').load(href,function(){
                    $('#mymodal').modal({show:true});
                    $('#mymodal .modal-title').text('Enrolment History');
                    return;
                });

            }
            else{
                toastr.error("Please search for a patient to access this feature");
            }
            
        });

    //delete client
        function deleteClient(r)
        {       
            if(confirm("Are you sure you want to delete?")){
                var href = r.getAttribute("href");
                var id = $('#home_idcno').text();
                $.ajax({
                    type: 'get',
                    url: href,
                    data:{'id':id},
                    success: function()
                    {                                           
                        $('#home_idcno').text('');   
                        $('#home_name').text('');    
                        $('#home_religion').text('');    
                        $('#home_marital').text('');     
                        $('#home_regdate').text(''); 
                        $('#home_followup').text('');        
                        $('#home_dob').text('');     
                        $('#home_contact').text('');     
                        $('#home_gender').text('');  
                        $('#home_country').text(''); 
                        $('#home_hasid').text('');   
                        $('#home_district').text('');        
                        $('#home_tribe').text('');
                        $('#home_image_preview_container').attr('src', 'images/avatar.png');
                        $('#home_street').text('');  
                        $('#home_parish').text('');  
                        $('#home_subcounty').text('');   
                        $('#home_parish').text('');  
                        $('#home_village').text('');
                        $('#home_zone').text('');
                        $('#home_county').text(''); 
                        $('.error').text("");
                        $(".error").css("display", "none");

                        //clear encounters table
                        var table = document.getElementById("patientencounters");
                        var count = $('#patientencounters tr').length;
                        if(count >=1){
                            for(var i = table.rows.length - 1; i > 0; i--){
                            table.deleteRow(i);
                            } 
                        }
                    }

                }); 
            }        
        }

    //delete phone
        function removePhone(r){
            r.parentNode.parentNode.remove();
            var id = r.parentNode.parentNode.getElementsByTagName('input')[0].value;
            $.ajax({
                type: 'get',
                url: '<?php echo e(route("deletephone")); ?>',
                data:{'id':id},
                success: function(phones)
                {                                           
                    
                }

            });

        }

    // populate Related dropdowns
        //Distrit dropdown
            $(document).on('change', '#country', function() {
                var country_id = $(this).val();
                // var country_name = $( "#country option:selected" ).text();
                var dropdown = document.getElementById('district');
                $.ajax({
                    type: 'get',
                    url: '<?php echo e(route("getdistricts")); ?>',
                    data: {'id':country_id},
                    success: function(data){
                        let option;
                        let defaultOption = document.createElement('option');
                        if(data.length>=1)
                        {   
                            dropdown.length = 0;
                            defaultOption.text = 'Select District';
                            dropdown.add(defaultOption);
                            dropdown.selectedIndex = 0;
                            for (var i = 0; i < data.length; i++){
                                option = document.createElement('option');
                                option.text = data[i].Name;
                                option.value = data[i].OID;
                                dropdown.add(option);
                            }
                        }
                        else
                        {   
                            
                            $('#district').empty().append(new Option('No Districts Found', ''));
                            $('#county').empty().append(new Option('Select County', ''));
                            $('#subcounty').empty().append(new Option('Select Subcounty', ''));
                            $('#parish').empty().append(new Option('Select Parish', ''));
                            $('#village').empty().append(new Option('Select Village', ''));
                        } 
                    },
                    error: function(){
                        console.log('success');
                    },
                });
            });

        // populate County Dropdown
            $(document).ready(function () {
                $(document).on('change', '#district', function() {
                    var district_id = $(this).val();
                    var district_name = $( "#district option:selected" ).text();
                    var dropdown = document.getElementById('county');
                    $.ajax({
                        type: 'get',
                        url: '<?php echo e(route("getcounties")); ?>',
                        data: {'id':district_id},
                        success: function(data){
                            let option;
                            let defaultOption = document.createElement('option');
                            if(data.length>=1)
                            {   
                                dropdown.length = 0;
                                defaultOption.text = 'Select County';
                                dropdown.add(defaultOption);
                                dropdown.selectedIndex = 0;
                                for (var i = 0; i < data.length; i++){
                                    option = document.createElement('option');
                                    option.text = data[i].Name;
                                    option.value = data[i].OID;
                                    dropdown.add(option);
                                }
                            }
                            else
                            {                       
                                $('#county').empty().append(new Option('Select County', ''));
                                $('#subcounty').empty().append(new Option('Select Subcounty', ''));
                                $('#parish').empty().append(new Option('Select Parish', ''));
                                $('#village').empty().append(new Option('Select Village', ''));
                            } 
                        },
                        error: function(){
                            console.log('success');
                        },
                    });
                });
            });

        // populate Subcounty Dropdown
            $(document).ready(function () {
                $(document).on('change', '#county', function() {
                    var county_id = $(this).val();
                    var county_name = $( "#county option:selected" ).text();
                    var dropdown = document.getElementById('subcounty');
                    $.ajax({
                        type: 'get',
                        url: '<?php echo e(route("getsubcounties")); ?>',
                        data: {'id':county_id},
                        success: function(data){
                            let option;
                            let defaultOption = document.createElement('option');
                            if(data.length>=1)
                            {   
                                dropdown.length = 0;
                                defaultOption.text = 'Select Subcounty';
                                dropdown.add(defaultOption);
                                dropdown.selectedIndex = 0;
                                for (var i = 0; i < data.length; i++){
                                    option = document.createElement('option');
                                    option.text = data[i].Name;
                                    option.value = data[i].OID;
                                    dropdown.add(option);
                                }
                          
                            }
                            else{
                                // dropdown.length = 0;
                                // defaultOption.text = 'No Subcounties Found';
                                // dropdown.add(defaultOption);
                                // dropdown.selectedIndex = 0;
                                $('#subcounty').empty().append(new Option('Select Subcounty', ''));
                                $('#parish').empty().append(new Option('Select Parish', ''));
                                $('#village').empty().append(new Option('Select Village', ''));
                            } 
                        },
                        error: function(){
                            console.log('success');
                        },
                    });
                });
            });

        // populate Parish Dropdown
            $(document).ready(function () {
                $(document).on('change', '#subcounty', function() {
                    var subcounty_id = $(this).val();
                    var subcounty_name = $( "#subcounty option:selected" ).text();
                    var dropdown = document.getElementById('parish');
                    $.ajax({
                        type: 'get',
                        url: '<?php echo e(route("getparishes")); ?>',
                        data: {'id':subcounty_id},
                        success: function(data){
                            let option;
                            let defaultOption = document.createElement('option');
                            if(data.length>=1)
                            {   
                                dropdown.length = 0;
                                defaultOption.text = 'Select Parish';
                                dropdown.add(defaultOption);
                                dropdown.selectedIndex = 0;
                                for (var i = 0; i < data.length; i++){
                                    option = document.createElement('option');
                                    option.text = data[i].Name;
                                    option.value = data[i].OID;
                                    dropdown.add(option);
                                }
                            }
                            else{
                                $('#parish').empty().append(new Option('Select Parish', ''));
                                $('#village').empty().append(new Option('Select Village', ''));
                            } 
                        },
                        error: function(){
                            console.log('success');
                        },
                    });
                });
            });

        // populate Village Dropdown
            $(document).ready(function () {
                $(document).on('change', '#parish', function() {
                    var dropdown = document.getElementById('village');
                    var parish_id = $(this).val();
                    var parish_name = $( "#parish option:selected" ).text();
                    
                    $.ajax({
                        type: 'get',
                        url: '<?php echo e(route("getvillages")); ?>',
                        data: {'id':parish_id},
                        success: function(data){
                            let option;
                            let defaultOption = document.createElement('option');
                            if(data != null && data.length>0)
                            {   
                                dropdown.length = 0;
                                defaultOption.text = 'Select Village';
                                dropdown.add(defaultOption);
                                dropdown.selectedIndex = 0;
                                for (var i = 0; i < data.length; i++){
                                    option = document.createElement('option');
                                    option.text = data[i].Name;
                                    option.value = data[i].OID;
                                    dropdown.add(option);
                                }
                            }
                            else{
                                $('#village').empty().append(new Option('Select Village', ''));
                            } 
                        },
                        error: function(){
                            console.log('success');
                        },
                    });
                });
            });

    // confirm broser close
        //     window.onbeforeunload = function (e) {
        //         e = e || window.event;

        //         // For IE and Firefox prior to version 4
        //         if (e) {
        //             e.returnValue = 'Any string';
        //         }

        //         // For Safari
        //         return 'Any string';
        //     };
</script>
</body>
<!-- <?php echo toastr_js(); ?> -->
<script type="text/javascript" src="<?php echo e(url('js/toastr.min.js')); ?>"></script>
<?php echo app('toastr')->render(); ?>

</html>
<?php /**PATH C:\xampp\htdocs\OpenICEA\modules/User\Resources/views/partials/footer.blade.php ENDPATH**/ ?>