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
                            <?php $__currentLoopData = $requisitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requisition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="row100 body clickable-row" style="height:30px;">

                                    <input type="hidden" value="<?php echo e($requisition->OID); ?>" />
                                    <td class="cell100 column3" style="padding-left:10px;"><?php echo e($requisition->rpatient->IDCNO); ?></td>
                                    <td class="cell100 column5"><?php echo e($requisition->rpatient->FirstName .' '.$requisition->rpatient->Surname); ?></td>
                                    <td class="cell100 column5"><?php $__currentLoopData = $requisition->requisitiontest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sample): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($sample->labsample->Name); ?>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                                    <td class="cell100 column5">
                                        <?php $__currentLoopData = $requisition->requisitiontest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($test->TestName); ?>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td class="cell100 column2"><?php echo e($requisition->CollectedBy); ?></td>
                                    <?php if($requisition->_grrequisition ==null): ?>
                                    <td class="cell100 column5"></td><td class="cell100 column3"></td><td class="cell100 column3"></td>

                                    <?php else: ?>
                                        <td class="cell100 column5">    
                                            <?php echo e($requisition->_grrequisition->grprovider->FirstName .' '.$requisition->_grrequisition->grprovider->LastName); ?>

                                        </td>
                                        <?php
                                            $time = explode(" ",$requisition->_grrequisition->created_at)
                                        ?>
                                        <td class="cell100 column3" style="width: 8%;">
                                            <?php echo e($time[0]); ?>

                                        </td>
                                        <td class="cell100 column3" style="width: 8%;">
                                            <?php echo e($time[1]); ?>

                                        </td>
                              
                                    <?php endif; ?>
                                    <td class="cell100 column5" align="center" style="font-size: 12px">
                                        <?php if($requisition->SampleCollected =="2"): ?>
                                            <a class="labResult" href="<?php echo e(route('viewresults', ['id' => Crypt::encrypt($requisition->OID)])); ?>" id="Lab Results" onclick="results(this); return false;"> View Results</a>
                                        <?php elseif($requisition->SampleCollected =="1"): ?>
                                            <a href="" onclick="return false">Samples collected</a>
                                        <?php else: ?>
                                             <a class="editlabreq" href="<?php echo e(route('editrequisition', ['id' => Crypt::encrypt($requisition->OID)])); ?>" id="Edit Lab Requisition" onclick="editlab(this); return false;"> Edit</a> | <a href="<?php echo e(route('deleterequisition', ['id' => Crypt::encrypt($requisition->OID)])); ?>" onclick="deletelab(this); return false;">Delete</a>
                                        <?php endif; ?>
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
            $("#labtablebody").load('<?php echo e(route("patientlabs",["date"=>""])); ?>'+date+ '/'+idcno +' #labtablebody');
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
  <?php /**PATH C:\xampp\htdocs\OpenICEA\modules/Laboratory\Resources/views/patientlabs.blade.php ENDPATH**/ ?>