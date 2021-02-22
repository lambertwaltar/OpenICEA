@php
    $followstatus = ['1'=>'Active','2'=>'Lost']
@endphp
<div class="limiter" style="clear:both; width:100%;">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100 ver1 m-b-110" id="enrolmenthistorytable">
                <div class="table100-head">
                </div>
                <div class="table100-body js-pscroll">
                    <table ><tbody>
                        @foreach($data as $dat)
                        <tr class="row100 body clickable-row">
                            <th class="cell100 column3" >Client No:</th>
                            <td class="cell100 column1"> {{$dat->IDCNO}}</td>
                        </tr>
                        <tr class="row100 body clickable-row">
                            <th class="cell100 column3" >Name</th>
                            <td class="cell100 column1">{{$dat->FirstName.' '.$dat->Surname}}</td>
                        </tr>
                        <tr class="row100 body clickable-row">
                            <th class="cell100 column3" >Regitration Date</th>
                            <td class="cell100 column1">{{$dat->RegistrationDate}}</td>
                        </tr>
                        <tr class="row100 body clickable-row">
                            <th class="cell100 column3" >Followup status</th>
                            <td class="cell100 column1">{{$followstatus[$dat->FollowUpStatus]}}</td>
                        </tr>
                        @endforeach
                    </tbody></table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>