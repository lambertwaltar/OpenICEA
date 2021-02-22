<form id="searchform" method="get" style="margin-top:10px !important; margin-left:10px !important;">
    <input type="date" name="labrequisitionsearch" id="flowsheetsearch" style="padding:2px;" autofocus>
    <input type="button" name="submit" class="action-button" value="Go" id="labsgo" />
    <input type="hidden" value="" name="fidcno" id="fidcno" />
    <input type="hidden" name="encounterno" id="fencounterno">
    <input type="hidden" name="age" id="fage">
    <input type="hidden" name="fullname" id="ffullname" readonly>
    <input type="hidden" name="visitdate" id="fvisitdate" readonly>
    <a href="<?php echo e(route('newflowsheet')); ?>" id="New Client Flowsheet" onclick="newflowsheet(this); return false;" style="margin: 6px 40px;font-size: 0.9em;"> New FlowSheet</a>
</form>

<div class="limiter">
    <div class="container-table100" style="padding:10px 0px !important;">
        <div class="wrap-table100">
            <div class="table100 ver1 m-b-110" style="padding-top:0">
                <div class="table100-body js-pscroll" id="labtablebody">
                    <table>
                        <thead>
                            <tr class="row100 head" style="height: 40px;">
                                <th class="cell100 column1">VisitDate</th>
                                <th class="cell100 column5">Next Appointment Date</th>
                                <th class="cell100 column5">Reasons</th>
                                <th class="cell100 column5"></th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php $__currentLoopData = $flowsheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flowsheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="row100 head" style="height: 40px;">
                                <td class="cell100 column1"><?php echo e($flowsheet->TriageDate); ?></td>
                                <td class="cell100 column5"><?php echo e($flowsheet->fspatient->returnappointment->ReturnDate.' | '.$flowsheet->fspatient->returnappointment->ReturnTime); ?></td>
                                <td class="cell100 column5"><?php $__currentLoopData = $flowsheet->fsencounter->encounterreason; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($reason->Name .','); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                                <td class="cell100 column5">
                                     <a class="editlabreq" href="<?php echo e(route('editflowsheet', ['id' => Crypt::encrypt($flowsheet->OID)])); ?>" id="FlowSheet | <?php echo e($flowsheet->OID); ?>" onclick="editsheet(this); return false;"> View/Edit</a> | <a href="<?php echo e(route('deleteflowsheet', ['id' => Crypt::encrypt($flowsheet->OID)])); ?>" onclick="deletelab(this); return false;">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        function editsheet(r){

            var href = r.getAttribute("href");
            var id = r.getAttribute("id");
            $('#partial2').load(href,function(){
                $('#mymodal2').modal({show:true});
                $('#mymodal2 .modal-dialog').addClass("modal-lg");
                $('#mymodal2 .modal-title').text('Flowsheet ['+$("#ffullname").val()+']');
				//$('#mymodal2 .modal-title').append(' <a href="javascript:void(0)" style="font-size:14px;" id="editflowsheet">Edit</a>')

                $('#fullname').val($('#ffullname').val());
                $('#encounterno').val($('#fencounterno').val());
                $('#idcno').val($('#fidcno').val());
                $('#visitdate').val($('#fvisitdate').val());
                $('#age').val($('#fage').val());
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

            //$("#labtablebody").load("<?php echo e(route('flowsheets')); ?>"+ " #labtablebody");
            // $("#labtablebody").load('<?php echo e(route("flowsheets",["idcno"=>""])); ?>'+$('#fidcno').val()+ ' #labtablebody');

        });

    //date search
        $(document).on('click','#labsgo',function(e){
            e.preventDefault();
            var date = $('#labrequisitionsearch').val();
            var idcno = $('input[name=idcno]').val();
            $("#labtablebody").load('<?php echo e(route("patientlabs",["date"=>""])); ?>'+date+ '/'+idcno +' #labtablebody');
            return;
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

    //load new form
        function newflowsheet(r)
        {       
            console.log('1st one')
            var href = r.getAttribute("href");
            var id = r.getAttribute('id');                        
            $('#partial2').load(href,function(){
                $('#mymodal2').modal({show:true});
                $('#mymodal2 .modal-title').text(id);
                //$('#mymodal2 .modal-dialog').css("max-width",'700px');
                $('#mymodal2 .modal-dialog').addClass("modal-lg");

                $('#fullname').val($('#ffullname').val());
                $('#encounterno').val($('#fencounterno').val());
                $('#idcno').val($('#fidcno').val());
                $('#visitdate').val($('#fvisitdate').val());
                $('#age').val($('#fage').val());
                return;
            }); 
            return;
        }


</script>
  <?php /**PATH C:\xampp\htdocs\OpenICEA\modules/Patient\Resources/views/flowsheet/index.blade.php ENDPATH**/ ?>