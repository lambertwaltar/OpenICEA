<form id="msform">
    <?php echo e(csrf_field()); ?>

    
     <table class="prescription_table">
            <tr>
                <td>Name:</td><td>  <input type="text" name="name" autofocus/></td>
            </tr>
            <tr>
                <td>Lab Test Type:</td>
                <td>
                     <select class="form-control" name="testtype" id="testtype" required>
                        <option value="">---</option>
                        <option value="1">HIV Screening</option>
                        <option value="2">Core Lab</option>
                        <option value="3">Stat Lab</option>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>Sample Type:</td>
                <td>
                     <select class="form-control" name="sampletype" id="sampletype" required>
                        <option value="">---</option>
                        <?php $__currentLoopData = $sampletypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sampletype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($sampletype->OID); ?>"><?php echo e($sampletype->Name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                     <div style="text-align: left;">
                        <label for="approval" style="float: left; margin:5px; color:#495057; font-family: montserrat;"> Requires Approval</label>
                        <input type="checkbox" id="approval" name="approval" value="1" style="float: left; width:auto; margin:5px;  width: 1.5em; height: 1.5em;">
                    </div>

                </td>
            </tr>

            </tr>
        </table>
   
    <span class="error laberror" style="display:none;"></span>
    <div class="modal-footer">
       	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" name="savelabtest" class="action-button" value="Save" id="savelabtest" />
    </div>
</form><?php /**PATH C:\xampp\htdocs\OpenICEA\modules/Laboratory\Resources/views/labtestform.blade.php ENDPATH**/ ?>