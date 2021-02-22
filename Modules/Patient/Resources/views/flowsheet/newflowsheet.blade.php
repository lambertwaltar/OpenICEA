<style>
    * {box-sizing: border-box}

    /* Style the tab */
    .tab {
      float: left;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
      width: 40%;
      margin-top: 1px;
      /* height: 300px; */
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
      display: block;
      background-color: inherit;
      color: black;
      padding: 5px 16px;
      width: 100%;
      border: none;
      outline: none;
      text-align: left;
      cursor: pointer;
      transition: 0.3s;
      border-bottom: solid 0.5px #ccc;
      font-family: montserrat;
      font-size: 0.7em;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
      background-color: #ddd;
    }

    /* Create an active/current "tab button" class */
    .tab button.active {
      background-color: rgb(186, 209, 207);
	  background-color:#f7c743;

    }

    /* Style the tab content */
    .tabcontent {
      float: left;
      padding: 0px 12px;
      border: 1px solid #ccc;
      width: 100%;
      border-left: none;
      min-width: 450px;
     /*  height: 300px; */
    }
	@media (min-width: 576px){
		.tabcontent {
			min-width: 0;
		}
	}
		
    .modal-footer{
        border-top: 0;
    }
    label{
        margin-bottom: 0 !important;
    }
    #msform{
        width: 100% !important;
    }
</style>

<!-- sidebar -->
<div style="display:flex;">
    <div class="tab">
      <button class="tablinks" style="cursor: pointer" onclick="openDiv(event, 'triage')" id="defaultOpen">General and Triage</button>
      <button class="tablinks" onclick="openDiv(event, 'clinicalevents')">Clinical Events</button>
      <button class="tablinks" onclick="openDiv(event, 'carestatus')">Care Status</button>
      <button class="tablinks" onclick="openDiv(event, 'art')">Anti Retroviral Treatment</button>
      <button class="tablinks" onclick="openDiv(event, 'concurentmedication')">Concurrent Medications</button>
      <button class="tablinks" onclick="openDiv(event, 'concurentconditions')">Concurrent Medical Conditions</button>
    </div>
    <form id="msform" class="encounterform" autocomplete="off">
        {{ csrf_field() }}
        <div id="triage" class="tabcontent">
            <!-- client information -->
            <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Visit Information</h2>
            <input type="hidden" name="encounterno" id="encounterno">
            <input type="hidden" name="age" id="age">
            <table class="prescription_table">
                <tr>
                    <td>Client Number:</td><td> <input type="text" name="idcno" id="idcno" readonly></td>
                </tr>
                <tr>
                    <td>Client Name:</td><td><input type="text" name="fullname" id="fullname" readonly></td>
                </tr>
                <tr>
                    <td>Visit:</td><td><input type="text" name="visitdate" id="visitdate" readonly></td>
                </tr>
            </table>

            <!--  Clinical Information -->
            <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Vital Signs</h2>
            <table class="prescription_table">
                <tr>
                    <td>Systolic BP:</td><td> <input type="text" name="bphigh" id="bphigh"></td>
                </tr>
                <tr>
                    <td>Diastolic BP:</td><td><input type="text" name="bplow" id="bplow"></td>
                </tr>
                <tr>
                    <td>Temperatue</td><td><input type="text" name="temperature" id="temperature"></td>
                </tr>
                <tr>
                    <td>Weight:</td><td><input type="text" name="weight" id="weight" ></td>
                </tr>
                <tr>
                    <td>Height:</td><td><input type="number" name="height" id="height" min="10" value='{{$lastfs->Height}}'></td>
                </tr>
                <tr>
                    <td>MUAC:</td><td><input type="number" name="muac" id="muac" min="5"></td>
                </tr>

                <tr>
                    <td>BMI:</td><td><input type="number" name="bmi" id="bmi" readonly style="color:#FFFFFF"></td>
                </tr>
				<tr>
					<td>WHO Stage:</td>
					<td style="padding-top:5px;">
						<select class="form-control" name="whostage" style="min-width:100px; max-width: 100px;">
							<option value="">---</option>
							<option value="1">I</option>
							<option value="2">II</option>
							<option value="3">III</option>
							<option value="4">IV</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Karnofsky Score:</td>
					<td style="padding-top:5px;">
						<select class="form-control" name="karnofkyscore" style="min-width:100px; max-width: 100px;">
							<option value="">---</option>
							<option value="100">100</option>
							<option value="90">90</option>
							<option value="80">80</option>
							<option value="70">70</option>
							<option value="60">60</option>
							<option value="50">50</option>
							<option value="40">40</option>
							<option value="30">30</option>
							<option value="20">20</option>
							<option value="10">10</option>
							<option value="0">0</option>
							<option value="unknown">unknown</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>CDC Score:</td>
					<td style="padding-top:5px;">
						<select class="form-control" name="cdcscore" style="min-width:100px; max-width: 100px;">
							<option value="">---</option>
							<option value="W">W</option>
							<option value="A">A</option>
							<option value="B">B</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>TB:</td>
					<td> 
						<input type="checkbox" name="tb" value="1" style="width:auto;" />
					</td>
				</tr>
            </table>

            <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">TB Intensified Case Form</h2>
            <table class="prescription_table">
                <tr>
                    <td style="padding-bottom:10px;" colspan="2">If the patient has any of the following for 2 weeks , refer them to the  TB clinic!</td>
                </tr>
                <tr>
                    <td>Coughing:</td>
                    <td>
                        <select class="form-control" name="coughing" >
                            <option value="">---</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Blood Sputum:</td>
                    <td>
                        <select class="form-control" name="bloodsputum" >
                            <option value="">---</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Persistent Fever</td>
                    <td>
                        <select class="form-control" name="persistentfever" >
                            <option value="">---</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Weight Loss more than 3Kg:</td>
                    <td>
                        <select class="form-control" name="weightloss" >
                            <option value="">---</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Night Sweats:</td>
                    <td>
                        <select class="form-control" name="nightsweats" >
                            <option value="">---</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>

        <div id="clinicalevents" class="tabcontent">
            @include('patient::flowsheet.clinicalevents')
        </div>

        <div id="carestatus" class="tabcontent">
            @include('patient::flowsheet.carestatus')
        </div>

        <div id="art" class="tabcontent">
            @include('patient::flowsheet.art')
        </div>

        <div id="concurentmedication" class="tabcontent">
            @include('patient::flowsheet.concurrentmedications')
        </div>

        <div id="concurentconditions" class="tabcontent">
            @include('patient::flowsheet.concurrentconditions')
        </div>
    </form>
</div>
<span class="triage error" style="display:none;"></span> 
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <input type="button" name="saveflowsheet" class="action-button btn btn-primary" value="Save" id="saveflowsheet" />
</div>




<script type="text/javascript">
    //save Triage information
        $(document).ready(function () {   
            $('#saveflowsheet').on('click', function(e){
                e.preventDefault();
                var form = new FormData(document.getElementById('msform'));
                $.ajax({
                    type: 'post',
                    url: '{{route("saveflowsheet")}}',
                    data: form,
                    processData: false,
                    contentType: false,
                    success: function(data)
                    {
                        if(data.error){
                            $('.triage.error').html('');
                            for(var i=0;i<data.error.length;i++){
                                $('.triage.error').append(data.error[i]+' | ');
                            }
                            $(".triage.error").css("display", "block");
                            return;
                        }
                        $('#mymodal2').modal('hide');
                        toastr.success("Flowsheet Detail Saved");
                        $('#mymodal2').on('hidden.bs.modal', function () {
                            $("#mymodal #labtablebody").load('{{route("flowsheets",["idcno"=>""])}}'+$('#fidcno').val()+ ' #labtablebody');
                        });
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
                        toastr.error("Something Went Wrong");
                        console.log('Error');   
                    },
                });
                return;
            });

            $('#weight, #height').on('keyup change',function(){
                var weight = $('#weight').val();
                var height = $('#height').val();
                if(height!='' && weight!=''){
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
                    $('#bmi').val(bmi).css('background-color','').css('background-color',color).css('color','#FFFFFF');
                }
            });

            $('#muac').on('keyup change',function(){
                var muac = $('#muac').val();
                console.log(muac)
                var age = parseInt($('#age').val());
                if(muac!=''){
                    var color='';
                    console.log(color)
                    if(isBetween(age,0.5,4.9)){
                        if(muac<11.5){color='#ff0000';}
                        if(muac>=11.5 && muac<12.5){color='#ffff00';}
                        if(muac>=12.5){color='#00b050';}
                    }
                    if(isBetween(age,15,18)){
                        if(muac<18.5){color='#ff0000';}
                        if(muac>=18.5 && muac<21){color='#ffff00';}
                        if(muac>=21){color='#00b050';}
                    }
                    if(isBetween(age,18,59)){
                        if(muac<19){color='#ff0000';}
                        if(muac>=19.0 && muac<22){color='#ffff00';}
                        if(muac>=22){color='#00b050';}
                    }
                    if(age>=60){
                        if(muac<16){color='#ff0000';}
                        if(muac>=16 && muac<18.5){color='#ffff00';}
                        if(muac>=18.5){color='#00b050';}
                    }
                    $('#muac').css('background-color','').css('background-color',color).css('color','#FFFFFF');
                }
            });

            $('#bphigh,#bplow').on('keyup change',function(){
                var bphigh = $('#bphigh').val();
                var bplow = $('#bplow').val();
                console.log(bplow,bphigh)
                if(bphigh!='' && bplow!=''){
                    var color;
                    if(bphigh<120 && bplow<80){
                        color='#a7cd39';
                    }
                    if(isBetween(bphigh,120,129) && bplow<80){
                        color='#f9e802';
                    }
                    if(isBetween(bphigh,130,139) || isBetween(bplow,80,89)){
                        color='#f3b610';
                    }
                    if(bphigh>=140 || bplow>=90){
                        color='#b94723';
                    }
      
                    $('#bphigh,#bplow').css('background-color','').css('background-color',color).css('color','#FFFFFF');
                }    
            });
        });

    function isBetween(n, a, b) {
       return (n - a) * (n - b) <= 0
    }
</script>


<script>
    function openDiv(evt, divId) {
        // Declare all variables
        console.log('button clicked')
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the link that opened the tab
        document.getElementById(divId).style.display = "block";
        evt.currentTarget.className += " active";
    }
    document.getElementById("defaultOpen").click();

    //Tabs
        function mytabs(r){
            var link = r.getAttribute('href');
            var id = link.split('#');
            $('.mytabs').css('display','none');
            $('.nav-link').removeClass('active');
            $('#'+id[1]).css('display','block');
            r.classList.add("active")
            
        }
</script>