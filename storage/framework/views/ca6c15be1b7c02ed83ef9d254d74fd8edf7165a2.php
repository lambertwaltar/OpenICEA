<form id="msform" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="id">
    <input type="text" name="rolename" placeholder="Role name" autofocus/>
    <h2 class="fs-title">ASSIGN PERMISSIONS</h2>
    <select multiple="multiple" size="10" name="duallistbox_demo1[]" id="myselect">
        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value=<?php echo e($permission->id); ?>><?php echo e($permission->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" name="submit" class=" submit btn btn-primary" id="saverole" style="float:left;">Save Role</button>
    </div>
</form>
<script>
    var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox();
    $('#bootstrap-duallistbox-nonselected-list_duallistbox_demo1[]').css('min-height','200px !important');
</script>



<?php /**PATH C:\xampp\htdocs\OpenICEA\modules/User\Resources/views/management/addrole.blade.php ENDPATH**/ ?>