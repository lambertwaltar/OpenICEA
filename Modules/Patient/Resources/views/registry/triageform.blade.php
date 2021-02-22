<form id="msform" class="encounterform" >
    {{ csrf_field() }}
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
            <tr>
                <td rowspan="10">Visit Reasons:</td><td><textarea name="visitdate" id="visitdate"></textarea></td>
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
                <td>Height:</td><td><input type="number" name="height" id="height" min="10"></td>
            </tr>
            <tr>
                <td>MUAC:</td><td><input type="number" name="muac" id="muac" min="5"></td>
            </tr>

            <tr>
                <td>BMI:</td><td><input type="number" name="bmi" id="bmi" readonly style="color:#FFFFFF"></td>
            </tr>
        </table>
        <span class="triage error" style="display:none;"></span> 
	    <div class="modal-footer">
	       	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <input type="button" name="savetriageinfo" class="action-button" value="Save" id="savetriageinfo" />
	    </div>
</form>

<script type="text/javascript">
    //save Triage information
        $(document).ready(function () {   
            $('#savetriageinfo').unbind().bind('click', function(e){
                e.preventDefault();
                var form = new FormData(document.getElementById('msform'));
                $.ajax({
                    type: 'post',
                    url: '{{route("savetriage")}}',
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
                        $('#mymodal').modal('hide');
                        toastr.success("Triage Detail Saved");
                        $('#mymodal').on('hidden.bs.modal', function () {
                        });
                    },
                    error: function(){
                        toastr.error("Something Went Wrong");
                        console.log('Error');   
                    },
                });
                return;
            });

            $('#weight, #height').on('change',function(){
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
                    $('#bmi').val(bmi).css('background-color','').css('background-color',color);
                }
            });

            $('#muac').on('keyup',function(){
                var muac = $('#muac').val();
                console.log(muac)
                var age = parseInt($('#age').val());
                if(muac!=''){
                    var color='';
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
                    $('#muac').css('background-color','').css('background-color',color);
                }
            });

            $(document).on('change','#bphigh,#bplow',function(){
                var bphigh = parseInt($('#bphigh').val());
                var bplow = parseInt($('#bplow').val());
                if(bphigh!=='' && bplow!==''){
                    var color;
                    if(bphigh<120 && bplow<80){
                        color='#a7cd39';
                    }
                    else if(isBetween(bphigh,120,129) && bplow<80){
                        color='#f9e802';
                    }
                    else if(isBetween(bphigh,130,139) || isBetween(bplow,80,89)){
                        color='#f3b610';
                    }
                    else(bphigh>139 || bplow>89){
                        console.log(bphigh);
                        color='#b94723';
                    }
                    //$('#bphigh').css('background-color','').css('background-color',color);
                    $('#bplow').css('background-color','').css('background-color',color);
                }
                else{
                    console.log('empty')
                } 
            });
        });

    function isBetween(n, a, b) {
       return (n - a) * (n - b) <= 0
    }
</script>