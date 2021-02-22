<form id="msform" class="encounterform" >
    {{ csrf_field() }}
    <!-- client information -->
        <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Client Information</h2>
        <input type="hidden" name="encounterno" id="encounterno">
        <table class="prescription_table">
            <tr>
                <td>Client Number:</td><td> <input type="text" name="idcno" id="idcno" readonly></td><td style="min-width:300px;"></td>
            </tr>
            <tr>
                <td>Client Name:</td><td><input type="text" name="fullname" id="fullname" readonly></td>
            </tr>
            <tr>
                <td>Visit:</td><td><input type="text" name="visitdate" id="visitdate" readonly></td>
            </tr>
        </table>

    <!--  Clinical Information -->
        <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Clinical Information</h2>
        <table class="prescription_table">
            <tr>
                <td>Ordered By:</td><td> <input type="text" name="provider" value="{{Auth::user()->FirstName.' '. Auth::user()->LastName}}" readonly></td>
            </tr>
            <tr>
                <td>Ordered Date:</td><td><input type="date" name="ordereddate" id="ordereddate"></td>
                <td>Ordered Time:</td><td><input type="text" name="orderedtime" id="orderedtime" readonly></td>
            </tr>
        </table>
      
    <!-- sample information-->
        <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Select Material/Sample Type</h2>
         <table class="prescription_table">
            <tr><td rowspan="43">Material/Sample Type:</td></tr>
                @foreach($sampletypes as $sampletype)
                    <td>
                        <div class="pretty p-default">
                            <input type="checkbox" name="samples" value="{{$sampletype->OID}}" /><div class="state p-primary"><label>{{$sampletype->Name}}</label></div>
                        </div>
                    </td>
                    @if($sampletype->OID%4==0)
                        <tr><td></td></tr>
                    @endif

                @endforeach
                <td>
                    <div class="pretty p-default">
                        <input type="checkbox" name="othersample" id="othersample" /><div class="state p-primary"><label>Other (Specify)</label></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="specifybiopsy" id="specifybiopsy" placeholder="Specify Biopsy" readonly></td>
                <td colspan="2"><input type="text" name="othersamplespecify" id="othersamplespecify" placeholder="Specify other sample" readonly/></td>

            </tr>
        </table>
       
    <!-- Lab Tests-->
        <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Select Lab Tests</h2>
         <table class="prescription_table latbtests" id="latbtests" style="">
            <tr><td rowspan="43" style=" min-width: 165px; width: 168px;">Material/Sample Type:</td></tr>
            <tr>
                <td class="labtestcontent">No samples selected</td>
            </tr>
            

        </table>
        <span class="error laberror" style="display:none;"></span>  

        <div style=" border-radius:5px; margin-top:2%; ">
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
	        <input type="button" name="saverequisition" class="action-button" value="Save" id="saverequisition" />
	    </div>
</form>

<script type="text/javascript">
    //other sample
         $(document).on('change','input[name=othersample]', function(){
            if(document.getElementById("othersample").checked == true){
               $('#othersamplespecify').prop('readonly', false);

            }
            else{
                $('#othersamplespecify').val('').prop('readonly', true);
            }

         });

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
            
            $('input[name="ordereddate"]').attr('min', [year, month, day].join('-'));
            $('input[name="ordereddate"]').val([year, month, day].join('-'));

            //ordered time
            var hours = fullDate.getHours();
            var minutes = fullDate.getMinutes();
            var seconds = fullDate.getSeconds();
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0'+minutes : minutes;
            var strTime = hours + ':' + minutes + ' ' + ampm;
            $('input[name="orderedtime"]').val([hours, minutes, seconds].join(':')+" "+ampm);

        });

    //get sample tests
        $('input[name=samples]').unbind().bind('change', function(){
            if($(this).parent().find('label').text()=='Biopsy'){
                if($(this).is(":checked")){
                    $('#specifybiopsy').prop('readonly', false);
                }
                else{
                    $('#specifybiopsy').val('').prop('readonly', true);
                }
            } 
            var samples = [];
            var availabletests = []
            var checkboxes = document.querySelectorAll('input[name=samples]:checked');
            var tests = document.querySelectorAll('input[name="labtests[]"]:checked');
            debugger
            for (var i=0; i<tests.length; i++) {
                availabletests.push(parseInt(tests[i].value));
            }
            console.log(availabletests);
            for (var i=0; i<checkboxes.length; i++) {
                samples.push(checkboxes[i].value);
            }
            if(samples.length>0){
                $.ajax({
                    type: 'get',
                    url: '{{route("getsampletests")}}',
                    data:{'samples':samples},
                    success: function(data)
                    {  
                        $(".labtestcontent").html('');
                        $(".latbtests tbody .labtestcontent").append('<tr>');
                        var x=1;
                        // debugger;
                        if(data.length>0){
                            for(var j=0;j<data.length;j++){
                                console.log(data[j].OID);
                                if(availabletests.includes(data[j].OID)){
                                    var markup = '<td style="font-size: inherit;"><div class="pretty p-default"><input type="checkbox" name="labtests[]" value="'+data[j].OID+'" checked /><div class="state p-primary"><label>'+data[j].TestName+'</label></div></div></td>';
                                }
                                else{
                                    var markup = '<td style="font-size: inherit;"><div class="pretty p-default"><input type="checkbox" name="labtests[]" value="'+data[j].OID+'" /><div class="state p-primary"><label>'+data[j].TestName+'</label></div></div></td>';
                                }
                                $(".latbtests tbody .labtestcontent").append(markup);
                                if(parseInt(x)%4==0){
                                    $(".latbtests tbody .labtestcontent").append('</tr><tr></td><br></td>');
                                }
                                x++;

                            }       
                        }
                        else{
                            $(".latbtests tbody .labtestcontent").append('No Tests available');
                        }
                    }

                });
            }

            else{
                $(".labtestcontent").html('');
                $(".latbtests tbody .labtestcontent").append('No samples selected');

            }
            return; 
        });

    //save Lab Requisition
        $(document).ready(function () {   
            $('#saverequisition').unbind().bind('click', function(e){
                e.preventDefault();
                var form = new FormData(document.getElementById('msform'));
                $.ajax({
                    type: 'post',
                    url: '{{route("createlabrequisition")}}',
                    data: form,
                    processData: false,
                    contentType: false,
                    success: function(data)
                    {
                        if(data.error){
                            $('.laberror').html('');
                            $('.laberror').text(data.error);
                            $(".laberror").css("display", "block");
                            return;
                        }
                        $('#mymodal').modal('hide');
                        $('.success').text("Lab Requisition Successful");
                        $('.success').css("display",'block');
                        toastr.success("Lab requisition Sussessful");

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
                return;
            });
        });
</script>