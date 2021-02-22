  
 
<?php $__env->startSection("title"); ?>
  OpenICEA | Register
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
	<style>
		.login, .image {
			min-height: 100vh;
			padding: 0 !important;
		}
	</style>
	
	<style>
		.login-form {
			width: 500px;
			margin: 30px auto;
		}
		.login-form form {        
			margin-bottom: 15px;
			background: #f7f7f7;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			padding: 30px;
		}
		.login-form h2 {
			margin: 0 0 15px;
		}
		.form-control, .login-btn {
			border-radius: 2px;
		}
		.input-group-prepend .fa {
			font-size: 18px;
		}
		.login-btn {
			font-size: 15px;
			font-weight: bold;
			min-height: 40px;
		}
		.social-btn .btn {
			border: none;
			margin: 10px 3px 0;
			opacity: 1;
		}
		.social-btn .btn:hover {
			opacity: 0.9;
		}
		.social-btn .btn-secondary, .social-btn .btn-secondary:active {
			background: #507cc0 !important;
		}
		.social-btn .btn-info, .social-btn .btn-info:active {
			background: #64ccf1 !important;
		}
		.social-btn .btn-danger, .social-btn .btn-danger:active {
			background: #df4930 !important;
		}
		.or-seperator {
			margin-top: 20px;
			text-align: center;
			border-top: 1px solid #ccc;
		}
		.or-seperator i {
			padding: 0 10px;
			background: #f7f7f7;
			position: relative;
			top: -11px;
			z-index: 1;
		}
		.form-control{
			font-size:0.8rem;
		}
	</style>
<div class="login-form">
    <form id="msform" action="<?php echo e(url('/post-registration')); ?>" method="post" class="card" style="width:550px;padding-top:5px;background-color: #edf5fa !important; padding:10px 5px; margin:10px auto !important;">
		<div style="display:flex; margin:20px auto; width:80%; border-bottom:solid 1px #cccccc; padding-bottom: 10px;">
			<img src="images/IDILogo.png" style="width:20%;margin-right: 20px;"><img src="images/openicea1.png" style="width:60%;margin:auto;">
		</div>
		<?php echo e(csrf_field()); ?>

        <h2 class="fs-title">ACCOUNT CREDENTIALS</h2>
		<div class="form-group" style="width:90%;">
        	<div class="input-group">
				<label for="username" class="col-md-4 col-form-label" style="margin-left: 20px; font-size: 0.8rem;">Username</label>
				<input class="form-control" type="text" name="username" id="username" value="<?php echo e(old('username')); ?>"  required/>
				<?php if($errors->has('username')): ?>
					<span class="error"><?php echo e($errors->first('username')); ?></span>
				<?php endif; ?> 
            </div>
        </div>
        
		<div class="form-group" style="width:90%;">
        	<div class="input-group">
				<label for="password" class="col-md-4 col-form-label" style="margin-left: 20px; font-size: 0.8rem;">Password</label>
				<input class="form-control" type="password" name="password" id="password" required/>
				<?php if($errors->has('password')): ?>
					<span class="error"><?php echo e($errors->first('password')); ?></span>
				<?php endif; ?> 
            </div>
        </div>
		
		<div class="form-group" style="width:90%;">
        	<div class="input-group">
				<label for="password_confirmation" class="col-md-4 col-form-label" style="margin-left: 20px; font-size: 0.8rem;">Confirm Password</label>
				<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required/>
				<?php if($errors->has('password_confirmation')): ?>
					<span class="error"><?php echo e($errors->first('password_confirmation')); ?></span>
				<?php endif; ?> 
            </div>
        </div>
		
        <h2 class="fs-title">Personal Details</h2>
        <div class="form-group" style="width:90%;">
        	<div class="input-group">
				<label for="firstname" class="col-md-4 col-form-label" style="margin-left: 20px; font-size: 0.8rem;">First name</label>
				<input class="form-control" type="text" name="firstname" id="firstname" value="<?php echo e(old('firstname')); ?>" required/>
				<?php if($errors->has('firstname')): ?>
					<span class="error"><?php echo e($errors->first('firstname')); ?></span>
				<?php endif; ?> 
            </div>
        </div>
		
		<div class="form-group" style="width:90%;">
        	<div class="input-group">
				<label for="lastname" class="col-md-4 col-form-label" style="margin-left: 20px; font-size: 0.8rem;">Last name</label>
				<input class="form-control" type="text" name="lastname" id="lastname" value="<?php echo e(old('lastname')); ?>" required/>
				<?php if($errors->has('lastname')): ?>
					<span class="error"><?php echo e($errors->first('lastname')); ?></span>
				<?php endif; ?> 
            </div>
        </div>
		
		<div class="form-group" style="width:90%;">
        	<div class="input-group">
				<label for="email" class="col-md-4 col-form-label" style="margin-left: 20px; font-size: 0.8rem;">Last name</label>
				<input class="form-control" type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" required/>
				<?php if($errors->has('email')): ?>
					<span class="error"><?php echo e($errors->first('email')); ?></span>
				<?php endif; ?> 
            </div>
        </div>
		<div style="width:30%; margin-left:65px;">
			<input type="submit" name="submit" class="btn btn-primary login-btn btn-block" value="REGISTER" style="float:left;color:#ffffff;padding:0 !important"/>
        </div>
    </form>
	<p class="text-center text-muted small">Have an account? <a href="<?php echo e(url('/')); ?>">Login Here!</a></p>
</div>           
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user::layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenICEA\modules/User\Resources/views/reg.blade.php ENDPATH**/ ?>