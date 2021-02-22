<form id="msform" class="encounterform" >
    <?php echo e(csrf_field()); ?>

    <?php $__currentLoopData = $requisition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- client information -->
        <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Material/Sample Type</h2>
        <input type="hidden" name="requisitionno" id="requisitionno" value="<?php echo e($req->OID); ?>">
        <input type="hidden" name="idcno" id="idcno" value="<?php echo e($req->rpatient->IDCNO); ?>">
        <input type="hidden" name="orderedby" id="orderedby" value="<?php echo e($req->rprovider->OID); ?>">
        <input type="hidden" name="encounter" id="encounter" value="<?php echo e($req->rencounter->visitDate); ?>">
        <input type="hidden" name="encounterno" id="encounterno" value="<?php echo e($req->rencounter->OID); ?>">
        <table class="prescription_table" style="margin-bottom:5px">
            <tr>
                <td style="width:200px;">Naterial/Sample Type:</td>
                <td  style="border: solid 1px #d6d4d0;padding: 3px; background:#f2f2f2;">
                 <p><?php $__currentLoopData = $req->requisitiontest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sample): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($sample->labsample->Name); ?> ,<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></p>
            </tr>
        </table>
    <!--  Clinical Information -->
        <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Lab Tests</h2>
        <table class="prescription_table" style="margin-bottom:5px">
            <tr>
                <td style="width:200px;">Lab Tests:</td>
                <td border="1" style="border: solid 1px #d6d4d0;padding: 3px; background:#f2f2f2;">
                 <?php $__currentLoopData = $req->requisitiontest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <p><?php echo e($test->TestName); ?></p><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
            </tr>
        </table>
      
    <!-- sample information-->
        <h2 class="fs-title" style="background:#d6d4d0; padding:5px !important;font-size: 12px;">Collection Information</h2>
         <table class="prescription_table">
            <tr>
                <td>Collected By:</td><td> <input type="text" name="collectedby" value="<?php echo e(Auth::user()->FirstName.' '. Auth::user()->LastName); ?>" readonly></td>
            </tr>
            <tr>
                <td>Collected Date:</td><td><input type="date" name="collecteddate" id="collecteddate"></td>
                <td>Time:</td><td><input type="text" name="collectedtime" id="collectedtime" readonly></td>
            </tr>
            <tr>
                <td>Is General Requisition:</td>
                <td> 
                    <select class="form-control" name="generalrequisition">
                        <option value="">---</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Is HIV Requisition:</td>
                <td> 
                    <select class="form-control" name="hivrequisition">
                        <option value="">---</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Is CoreLab Requisition:</td>
                <td> 
                    <select class="form-control" name="corelabrequisition">
                        <option value="">---</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                </td>
            </tr>
        </table>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="button" name="savecollectedsample" class="action-button" value="Save" id="savecollectedsample" />
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</form>

<script type="text/javascript">
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
            
            $('input[name="collecteddate"]').attr('min', [year, month, day].join('-'));
            $('input[name="collecteddate"]').val([year, month, day].join('-'));

            //ordered time
            var hours = fullDate.getHours();
            var minutes = fullDate.getMinutes();
            var seconds = fullDate.getSeconds();
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0'+minutes : minutes;
            var strTime = hours + ':' + minutes + ' ' + ampm;
            $('input[name="collectedtime"]').val([hours, minutes, seconds].join(':')+" "+ampm);

        });

    //update requisition
        $(document).on('click','#savecollectedsample', function(e){
            e.preventDefault();
            var form = new FormData(document.getElementById('msform'));
            var date = $('#labrequisitionsearch').val();
            $.ajax({
                type: 'post',
                data: form,
                url: '<?php echo e(route("updaterequisition")); ?>',
                processData: false,
                contentType: false,
                success: function()
                {
                    $('#mymodal').modal('hide');
                    // window.location = "<?php echo e(route('labrequisitions')); ?>";
                    //$("#labtablebody").load("<?php echo e(route('labrequisitions')); ?>"+ " #labtablebody");
                    $("#labtablebody").load('<?php echo e(route("labrequisitions",["date"=>""])); ?>'+date+ ' #labtablebody');
                    toastr.success("Sample Collected");

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
</script><?php /**PATH C:\xampp\htdocs\OpenICEA\modules/Laboratory\Resources/views/collectsample.blade.php ENDPATH**/ ?>