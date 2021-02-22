<?php $__env->startSection('title'); ?> OpenICEA | Admin <?php $__env->stopSection(); ?>

<?php $__env->startSection('links'); ?>
	<style type="text/css">
		#msform {
	    width: auto !important;
	    margin: 1px;
		}
	    
		#msform .action-button {
	    width: auto !important;
	    padding: 7px 20px !important;
	    font-weight: 200;
	    margin: 0px 5px;
		}

		#msform fieldset {
	    width: 100%;
	    margin: 0;
		}

		#msform input, #msform textarea {
		padding: 7px;
		}
	</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
	<!--<img src="images/user.png" style="width:4%;"> --><font class="page-heading">SYSTEM USERS</font>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">User name</th>
									<th class="cell100 column2">Full Name</th>
									<th class="cell100 column3" align="center" style="text-align: center;">IsApproved</th>
									<!-- <th class="cell100 column4">Clinician</th> -->
									<th class="cell100 column4">Roles</th>
									<th class="cell100 column5">Email Address</th>
									<th class="cell100 column5">Last login</th>
									<th class="cell100 column3"></th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
	                      		<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr class="row100 body clickable-row">
										<td class="cell100 column1"><?php echo e($user->username); ?></td>
										<td class="cell100 column2"><?php echo e($user->FirstName.' '. $user->LastName); ?></td>
										<td class="cell100 column3" align="center">
											<?php if($user->IsApproved =="1"): ?>
												<input type="checkbox" checked readonly>
											<?php else: ?>
												<input type="checkbox" readonly>
											<?php endif; ?>
										</td>
										<!-- <td class="cell100 column4"><?php echo e($user->Clinician); ?></td> -->
										<td class="cell100 column4">  <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <div style="float:left; margin-right:3px;"><?php echo e($role->name); ?>,</div> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
										<td class="cell100 column5"><?php echo e($user->EmailAddress); ?></td>
										<td class="cell100 column5"><?php echo e($user->LastloginDate); ?></td>
										<td class="cell100 column3">
											<a href="<?php echo e(route('edituser', ['id' => Crypt::encrypt($user->OID)])); ?>" id="edituser"><img src="images/edituser.png" style="width:20px; margin: 0 5px;" title="Edit User"></a>
											<?php if($user->IsApproved =="0"): ?>
												<a  href="<?php echo e(url('approveuser'.'/'.$user->OID)); ?>" ><img src="images/approve.png" style="width:20px; margin: 0 5px;" title="Approve User Account"></a>
											<?php endif; ?>

											
											<?php if(auth()->user()->OID == $user->OID): ?>
											<?php else: ?>
												<?php if($user->IsLockedOut =="1"): ?>
													<a href="<?php echo e(route('unlockaccount', ['id' => Crypt::encrypt($user->OID)])); ?>"><img src="images/unlock.png" style="width:20px; margin: 0 5px;" title="UnLock User Account"></a>
												<?php else: ?>
													<a href="<?php echo e(route('lockaccount', ['id' => Crypt::encrypt($user->OID)])); ?>"><img src="images/lock.png" style="width:20px; margin: 0 5px;" title="Lock User Account"></a>
												<?php endif; ?>
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


<?php $__env->stopSection(); ?>


        
  
<?php echo $__env->make('user::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenICEA\modules/User\Resources/views/management/index.blade.php ENDPATH**/ ?>