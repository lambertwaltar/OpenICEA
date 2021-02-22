<?php $__env->startSection("title"); ?>
  OpenICEA | Login
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
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
</head>
<body>

<div class="login-form">
    <form action="<?php echo e(url('post-login')); ?>" method="POST" class="card" style="padding-top:5px;background-color: #f7f7f7 !important;">
		<div style="display:flex; margin:20px auto; width:80%; border-bottom:solid 1px #cccccc; padding-bottom: 10px;">
			<img src="images/IDILogo.png" style="width:20%;margin-right: 20px;"><img src="images/openicea1.png" style="width:60%;margin:auto;">
		</div>
		<?php echo e(csrf_field()); ?>

		<?php if(Session::has('success')): ?>
        <div class="form-label-group">
          <span class="success">
              <?php echo e(session('success')); ?>

          </span>
        </div>
      <?php endif; ?>

      <?php if(Session::has('error')): ?>
        <div class="form-label-group">
          <span class="error">
            <?php echo e(session('error')); ?>

          </span>
        </div>
      <?php endif; ?>
        <!-- <h2 class="text-center" style="color:#9c9c9c;font-family: system-ui;"><p class="text-center text-muted small">Sign in</p></h2> -->
        <div class="form-group" style="width:90%;">
        	<div class="input-group">
				<label for="username" class="col-md-4 col-form-label" style="margin-left: 20px; font-size: 0.8rem;">Username</label>
				<input class="form-control" type="text" id="username" name="username" value="<?php echo e(old('username')); ?>" required="required"/>
				<?php if($errors->has('username')): ?>
					<span class="error"><?php echo e($errors->first('username')); ?></span>
				<?php endif; ?> 
            </div>
        </div>
		<div class="form-group" style="width:90%;">
            <div class="input-group">
				<label for="password" class="col-md-4 col-form-label" style="margin-left: 20px; font-size: 0.8rem;">Password</label>
				<input class="form-control" type="password" id="password" name="password" required="required"/>
				<?php if($errors->has('password')): ?>
					<span class="error"><?php echo e($errors->first('password')); ?></span>
				<?php endif; ?> 
            </div>
        </div>        
        <div style="width:25%; margin-left:30px;" >
            <button type="submit" class="btn btn-primary login-btn btn-block" style="font-weight:300">LOGIN</button>
        </div>
    </form>
    <p class="text-center text-muted small" style="font-size: 0.8rem !important;">Don't have an account? <a href="<?php echo e(url('registration')); ?>">Register Here!</a></p>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user::layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenICEA\modules/User\Resources/views/log.blade.php ENDPATH**/ ?>