<form id="searchform" method="get" style="margin-top:10px !important; margin-left:10px !important;">
    <input type="date" name="labrequisitionsearch" id="labrequisitionsearch" style="padding:2px;" autofocus>
    <input type="button" name="submit" class="action-button" value="Go" id="labsgo" />
    <input type="hidden" value="" name="idcno" />
</form>
<div class="limiter">
    <div class="container-table100" style="padding:10px 0px !important;">
        <div class="wrap-table100">
            <div class="table100 ver1 m-b-110" style="padding-top:0">
                <div class="table100-body js-pscroll">
                    <table id="labtablebody">
                        <thead>
                            <tr class="row100 head" style="height: 40px;">
                                <th class="cell100 column3" style="padding-left:10px;">Client No.</th>
                                <th class="cell100 column5">Client Name</th>
                                <th class="cell100 column5">Sample Information</th>
                                <th class="cell100 column5">Tests</th>
                                <th class="cell100 column2">Collected By</th>
                                <th class="cell100 column5">Tested By</th>
                                <th class="cell100 column3" style="width: 8%;">Test Date</th>
                                <th class="cell100 column3" style="width: 8%;">Test Time</th>
                                <th class="cell100 column5"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requisitions as $requisition)
                                <tr class="row100 body clickable-row" style="height:30px;">

                                    <input type="hidden" value="{{$requisition->OID}}" />
                                    <td class="cell100 column3" style="padding-left:10px;">{{$requisition->rpatient->IDCNO}}</td>
                                    <td class="cell100 column5">{{$requisition->rpatient->FirstName .' '.$requisition->rpatient->Surname}}</td>
                                    <td class="cell100 column5">@foreach($requisition->requisitiontest as $sample) {{ $sample->labsample->Name}}, @endforeach</td>
                                    <td class="cell100 column5">
                                        @foreach($requisition->requisitiontest as $test) {{ $test->TestName}}, @endforeach
                                    </td>
                                    <td class="cell100 column2">{{$requisition->CollectedBy}}</td>
                                    @if($requisition->_grrequisition ==null)
                                    <td class="cell100 column5"></td><td class="cell100 column3"></td><td class="cell100 column3"></td>

                                    @else
                                        <td class="cell100 column5">    
                                            {{ $requisition->_grrequisition->grprovider->FirstName .' '.$requisition->_grrequisition->grprovider->LastName}}
                                        </td>
                                        @php
                                            $time = explode(" ",$requisition->_grrequisition->created_at)
                                        @endphp
                                        <td class="cell100 column3" style="width: 8%;">
                                            {{$time[0]}}
                                        </td>
                                        <td class="cell100 column3" style="width: 8%;">
                                            {{$time[1]}}
                                        </td>
                              
                                    @endif
                                    <td class="cell100 column5" align="center" style="font-size: 12px">
                                        @if($requisition->SampleCollected =="2")
                                            <a class="labResult" href="{{ route('viewresults', ['id' => Crypt::encrypt($requisition->OID)]) }}" id="Lab Results" onclick="results(this); return false;"> View Results</a>
                                        @elseif($requisition->SampleCollected =="1")
                                            <a href="" onclick="return false">Samples collected</a>
                                        @else
                                             <a class="editlabreq" href="{{ route('editrequisition', ['id' => Crypt::encrypt($requisition->OID)]) }}" id="Edit Lab Requisition" onclick="editlab(this); return false;"> Edit</a> | <a href="{{ route('deleterequisition', ['id' => Crypt::encrypt($requisition->OID)]) }}" onclick="deletelab(this); return false;">Delete</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach             
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
   	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

<script>
    //edit requisition dialog
        function editlab(r){
            var href = r.getAttribute("href");
            var id = r.getAttribute("id");
            $('#partial2').load(href,function(){
                $('#mymodal2').modal({show:true});
                $('#mymodal2 .modal-dialog').addClass("modal-lg");
                $('#mymodal2 .modal-title').text(id);
                //$('#mymodal2 .modal-dialog').css("max-width",'600px');
                
                return;
            }); 
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
            //$('input[name="labrequisitionsearch"]').val([year, month, day].join('-'));

        });

    //date search
        $(document).on('click','#labsgo',function(e){
            e.preventDefault();
            var date = $('#labrequisitionsearch').val();
            var idcno = $('input[name=idcno]').val();
            $("#labtablebody").load('{{route("patientlabs",["date"=>""])}}'+date+ '/'+idcno +' #labtablebody');
        });

    //delete lab requisition
        function deletelab(r)
        {       
            if(confirm("Are you sure you want to delete?")){
                r.parentNode.parentNode.remove();
                var href = r.getAttribute("href");
                $.ajax({
                    type: 'get',
                    url: href,
                    // data:{'id':id},
                    success: function(data)
                    {                                           
                        return;
                    }

                }); 

            }
                    
        }

        function results(r)
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


</script>
  