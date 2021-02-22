<ul class="nav nav-tabs">
    <li class="nav-item">
        <a href="#sampledetails" class="nav-link active" onclick="mytabs(this);">Sample Details</a>
    </li>

    </li>
    <li class="nav-item">
        <a href="#crag" class="nav-link" onclick="mytabs(this);">Test Results</a>
    </li>
</ul>


<form id="msform" class="encounterform" >
    {{ csrf_field() }}
    <div class="mytabs" id="sampledetails">
        @foreach($requisition as $req)
        <!-- client information -->
            <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Client Information</h2>
            <input type="hidden" name="requisitionno" id="requisitionno" value="{{$req->OID}}">
            <input type="hidden" name="encounter" id="encounter" value="{{$req->rencounter->OID}}">
            @foreach($sample as $samp)
                <input type="hidden" name="samplecollectionno" id="samplecollectionno" value="{{$samp->OID}}">
            @endforeach
            <input type="hidden" name="idcno" id="idcno" value="{{$req->rpatient->IDCNO}}">
            <table class="prescription_table" style="margin-bottom:5px">
                <tr>
                    <td>Client No</td>
                    <td  style="border: solid 1px #d6d4d0;padding: 3px; background:#f2f2f2;">
                     <p>{{$req->rpatient->IDCNO }}</p>
                </tr>
                <tr>
                    <td>Client Name</td>
                    <td  style="border: solid 1px #d6d4d0;padding: 3px; background:#f2f2f2;">
                     {{$req->rpatient->FirstName." ".$req->rpatient->Surname }}
                </tr>
            </table>

            <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Sample Information</h2>
            <table class="prescription_table" style="margin-bottom:5px;max-width: 400px;">
                @foreach($req->requisitiontest as $sample)
                <tr>
                    @if($sample->labsample->Name == 'Blood')
                        <tr>
                            <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;">
                                <label for="purpletoptube" style="cursor: pointer;">Purple top tube [P], EDTA:</label>
                            </td>
                            <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0; cursor: pointer;">
                                <input type="checkbox" name="purpletoptube" value="1" style="width:auto; margin-right:5px;" />
                            </td>
                        </tr>
                        <tr>
                            <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;">
                                <label for="redtoptube" style="cursor: pointer;">Red top tube [R]:</label>
                            </td>
                            <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0; cursor: pointer;">
                                <input type="checkbox" name="redtoptube" value="1" style="width:auto; margin-right:5px;" />
                            </td>
                        </tr>
                    @else
                        <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;">
                            <label for="{{$sample->labsample->OID}}" style="cursor: pointer;">{{$sample->labsample->Name }}</label>
                        </td>
                        <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0; cursor: pointer;">
                            <input type="checkbox" name="samples" value="{{$sample->labsample->OID}}" id="{{$sample->labsample->OID}}" style="width:auto; margin-right:5px;" />
                        </td>

                    @endif
                </tr>
                @endforeach
                <tr>
                    <td width="20" style="border-bottom: solid 1px #ccc; border-right: solid 1px #ccc;">
                        <label for="othersample" style="cursor: pointer;">Other</label>
                    </td>
                    <td width="10" style="border-bottom: solid 1px #ccc; border-right: solid 1px #d6d4d0; cursor: pointer;">
                        <input type="checkbox" name="othersample" value="1" id="othersample" style="width:auto; margin-right:5px;" />
                    </td>
                </tr>
                <tr style="display:none;" class="othersamplespecify">
                    <td width="20">
                        <label for="othersamplespecify" style="cursor: pointer;">Other (Specify)</label>
                    </td>
                    <td width="10" >
                        <input type="text" name="othersamplespecify" style="width:auto; margin-right:5px;" />
                    </td>
                </tr>
            </table>
          
        <!-- sample information-->
            <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Clinical Information</h2>
             <table class="prescription_table">
                <tr>
                    <td>Ordered By:</td><td>
                        <input type="hidden" name="orderedbyoid" id="orderedbyoid" value="{{$req->rprovider->OID}}">
                        <input type="text" name="orderedby" value="{{$req->rprovider->FirstName.' '. $req->rprovider->LastName}}" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Collected By:</td><td> <input type="text" name="collectedby" value="{{$req->CollectedBy}}" readonly></td>
                </tr>
                <tr>
                    <td>Collected Date:</td><td><input type="date" name="collecteddate" id="collecteddate" value="{{$req->CollectedDate}}"  readonly></td>
                    @php
                        $time = explode(" ",$req->created_at)
                    @endphp
                    <td>Time:</td><td><input type="text" name="collectedtime" id="collectedtime" value="{{$time[1]}}" readonly></td>
                </tr>
                <tr>
                    <td>Tested By:</td><td> <input type="text" name="testedby" value="{{Auth::user()->FirstName.' '. Auth::user()->LastName}}" readonly></td>
                </tr>
                <tr>
                    <td>Tested Date:</td><td><input type="date" name="testeddate" id="testeddate"></td>
                    <td>Time:</td><td><input type="text" name="testedtime" id="testedtime" readonly></td>
                </tr>
               
            </table>
        @endforeach
    </div>

    <div class="mytabs" id="crag" style="display:none;">
        <table class="prescription_table">
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Screening Option</h2></td></tr>
            <tr><td>Screening Option:</td>
                <td>
                    <select name="screeningoption">
                        <option value=''>---</option>
                        <option value='1'>Option A</option>
                        <option value='2'>Option B</option>
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Option A: Abbot Determine HIV 1-2 Only (single test)</h2></td></tr>
            <tr><td>Single Test Result:</td>
                <td>
                    <select name="singletest">
                        <option value=''>---</option>
                        <option value='1'>Positive</option>
                        <option value='2'>Negative</option>
                        <option value='3'>Unknown</option>
                        <option value='4'>Results Not Ready</option>
                        <option value='5'>Not Yet Retested</option>
                    </select>
                </td>
            </tr>
            <tr><td>AIDS Defining Illness:</td>
                <td>
                    <textarea name="aidsdefiningillness"></textarea> 
                </td>
            </tr>
            <tr><td colspan="2"><h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Option B: HIV Screening Algorithm</h2></td></tr>
            <tr><td>Screening Test (1) Result:</td>
                <td>
                    <select name="screeningtest1">
                        <option value=''>---</option>
                        <option value='1'>Positive</option>
                        <option value='2'>Negative</option>
                        <option value='3'>Unknown</option>
                        <option value='4'>Results Not Ready</option>
                        <option value='5'>Not Yet Retested</option>
                    </select>
                </td>
            </tr>
            <tr><td>Confirming Test (2) Result:</td>
                <td>
                    <select name="confirmingtest">
                        <option value=''>---</option>
                        <option value='1'>Positive</option>
                        <option value='2'>Negative</option>
                        <option value='3'>Unknown</option>
                        <option value='4'>Results Not Ready</option>
                        <option value='5'>Not Yet Retested</option>
                    </select>
                </td>
            </tr>
            <tr><td>Tie Breaker Test (3) Result:</td>
                <td>
                    <select name="tiebreaker">
                        <option value=''>---</option>
                        <option value='1'>Positive</option>
                        <option value='2'>Negative</option>
                        <option value='3'>Unknown</option>
                        <option value='4'>Results Not Ready</option>
                        <option value='5'>Not Yet Retested</option>
                    </select>
                </td>
            </tr>
            <tr><td>Final Result:</td>
                <td><input type="text" name="finalresult"></td>
            </tr>
            <tr><td>Comments:</td>
                <td>
                    <textarea name="comments"></textarea> 
                </td>
            </tr>
        </table>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" name="savehivresults" class="action-button" value="Save" id="savehivresults" />
    </div>
</form>

<script type="text/javascript">
    //Tabs
        function mytabs(r){
            var link = r.getAttribute('href');
            var id = link.split('#');
            $('.mytabs').css('display','none');
            $('.nav-link').removeClass('active');
            $('#'+id[1]).css('display','block');
            r.classList.add("active")
            
        }

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
            
            $('input[name="testeddate"]').attr('min', [year, month, day].join('-'));
            $('input[name="testeddate"]').val([year, month, day].join('-'));

            //ordered time
            var hours = fullDate.getHours();
            var minutes = fullDate.getMinutes();
            var seconds = fullDate.getSeconds();
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0'+minutes : minutes;
            var strTime = hours + ':' + minutes + ' ' + ampm;
            $('input[name="testedtime"]').val([hours, minutes, seconds].join(':')+" "+ampm);

        });

    //other options
        $(document).on('change','input[name=othersample]', function(){
            if(document.getElementById("othersample").checked == true){
               $('.othersamplespecify').css('display', 'block');
            }
            else{
                $('.othersamplespecify').css('display', 'none');
            }

         });
    //Submit Results
        $('#savehivresults').unbind().bind('click', function(e){
            e.preventDefault();
            var form = new FormData(document.getElementById('msform'));
            var date = $('#labrequisitionsearch').val();
            $.ajax({
                type: 'post',
                data: form,
                url: '{{route("savehivresults")}}',
                processData: false,
                contentType: false,
                success: function()
                {
                    $('#mymodal').modal('hide');
                    $("#labtablebody").load('{{route("labrequisitions",["date"=>""])}}'+date+ ' #labtablebody');
                    toastr.success("HIV Requisition Results Submitted");

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
</script>