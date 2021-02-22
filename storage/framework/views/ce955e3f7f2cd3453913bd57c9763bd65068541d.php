<?php
    $followstatus = ['1'=>'Active','2'=>'Lost']
?>
<div class="limiter" style="clear:both; width:100%;">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100 ver1 m-b-110" id="enrolmenthistorytable">
                <div class="table100-head">
                </div>
                <div class="table100-body js-pscroll">
                    <table ><tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="row100 body clickable-row">
                            <th class="cell100 column3" >Client No:</th>
                            <td class="cell100 column1"> <?php echo e($dat->IDCNO); ?></td>
                        </tr>
                        <tr class="row100 body clickable-row">
                            <th class="cell100 column3" >Name</th>
                            <td class="cell100 column1"><?php echo e($dat->FirstName.' '.$dat->Surname); ?></td>
                        </tr>
                        <tr class="row100 body clickable-row">
                            <th class="cell100 column3" >Regitration Date</th>
                            <td class="cell100 column1"><?php echo e($dat->RegistrationDate); ?></td>
                        </tr>
                        <tr class="row100 body clickable-row">
                            <th class="cell100 column3" >Followup status</th>
                            <td class="cell100 column1"><?php echo e($followstatus[$dat->FollowUpStatus]); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody></table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div><?php /**PATH C:\xampp\htdocs\OpenICEA\modules/Patient\Resources/views/registry/enrolmenthistory.blade.php ENDPATH**/ ?>