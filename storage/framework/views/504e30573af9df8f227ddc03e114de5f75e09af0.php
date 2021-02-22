
<style>
	select:required:invalid {
    	color: #666;
    }
    select{
    	margin-bottom: 10px;
    }
	option[value=""][disabled] {
		display: none;
	}
	option {
		color: #000;
	}
</style>

<form id="msform" action="<?php echo e(url('/updateuser')); ?>" method="post">
	<?php echo e(csrf_field()); ?>

	<h2 class="fs-title">ACCOUNT CREDENTIALS</h2>
	<input type="hidden" name="oid" placeholder="Username" value="<?php echo e(Crypt::encrypt($user->OID)); ?>" readonly />
	<input type="text" name="username" placeholder="Username" value="<?php echo e($user->username); ?>" readonly />
	<input type="password" name="password" placeholder="Password" id="password" value=""autocomplete="new-password" />
	<input type="password" name="password_confirmation" placeholder="Confirm Password"/>
	<h2 class="fs-title">ASSIGN ROLE</h2>
	<select id="ms" multiple="multiple" class="form-control" name="roles[]">
	    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
	<h2 class="fs-title">Personal Details</h2>
	<h3 class="fs-subtitle"></h3>
	<input type="text" name="firstname" placeholder="First Name" value="<?php echo e($user->FirstName); ?>" />
	<?php if($errors->has('firstname')): ?>
	      <span class="error"><?php echo e($errors->first('firstname')); ?></span>
	<?php endif; ?> 
	<input type="text" name="lastname" placeholder="Last Name" value="<?php echo e($user->LastName); ?>" />
	<?php if($errors->has('lastname')): ?>
	      <span class="error"><?php echo e($errors->first('lastname')); ?></span>
	<?php endif; ?> 
	<input type="text" name="email" placeholder="Email Address" value="<?php echo e($user->EmailAddress); ?>" />
	<?php if($errors->has('email')): ?>
	      <span class="error"><?php echo e($errors->first('email')); ?></span>
	<?php endif; ?>

	<div style="text-align: left;">
        <label for="isclinician" style="float: left; font-size:0.8em; margin:5px; color:#495057; font-family: montserrat;"> Is Clinician?</label>
        <input type="checkbox" value='1' id="isclinician" name="isclinician" style="float: left; width:auto; margin:5px;  width: 1.5em; height: 1.5em;">
    </div>

    <div class="modal-footer">
	   	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    	<input type="submit" name="submit" class="action-button" value="Update User" id="updateuser" style="float:left;"/>
	</div>
</form>
<script>
    // Initialize multiple select on your regular select
   $(function() {
        $('#ms').change(function() {
            console.log($(this).val());
        }).multipleSelect({ width: '100%'});
    });

   $(document).ready(function(){
   		$('button span.placeholder').text('Assign Roles');

   });

</script>



<?php /**PATH C:\xampp\htdocs\OpenICEA\modules/User\Resources/views/management/edituser.blade.php ENDPATH**/ ?>