
<form class="detailsform" id="msform" action="javascript:void(0)" method="post"  enctype="multipart/form-data" style="position: relative;">
  <?php echo e(csrf_field()); ?>

    <!-- <fieldset style="position: relative;"> -->
        <!-- <legend  class="w-auto" style="color:#07abf8; margin:0 1%;font-size:0.8em; background:#ffffff; border-radius:3px; ">NEW CLIENT</legend> -->
        <div style='margin-bottom: 1%; z-index: 1;'>
        	<!-- Demographics section-->
	        <div style="display: inline-block; min-width: 200px; margin-right:15px; vertical-align: top;width: 20%;">
	        	<h2 class="fs-title">DEMOGRAPHICS</h2>
		        <input type="text" name="surname" placeholder="Surname" value="<?php echo e(old('surname')); ?>"  required/>
		        <span class="error" style="display:none"></span>

		        <input type="text" name="firstname" placeholder="First Name" value="<?php echo e(old('firstname')); ?>" required/>
		        <span class="error" style="display:none"></span>
	       
		        <select class="form-control" name="gender" required>
		        	<option value="">Gender</option>
		            <option value="1">Female</option>
		            <option value="2">Male</option>
		        </select>
		        <span class="error" style="display:none"></span>

		        <input type="date" name="dob" placeholder="Date of Birth:   " id="datepicker" value="<?php echo e(old('dob')); ?>"  required/>
		        <span class="error" style="display:none"></span>

		        <select class="form-control" name="maritalstatus" >
		        	<option value="">Marital Status</option>
		            <option value="1">Single</option>
		            <option value="2">Married</option>
		            <option value="3">cohabiting</option>
		            <option value="4">Separated</option>
		            <option value="5">Divorced</option>
		            <option value="6">Widowed</option>
		        </select>

		        <div>
			        <select class="form-control" name="tribe" id="tribe">
			        	<option value="">Select Tribe</option>
			            <?php $__currentLoopData = $tribes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tribe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				            <option value="<?php echo e($tribe->OID); ?>"><?php echo e($tribe->Name); ?></option>
			            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			        </select>
			        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit demographics')): ?>
			        	<!-- <a href="<?php echo e(route('newtribeform')); ?>" id="addtribe"> <img src="images/add1.png"style="width: 15px; float: left; margin: 7px 5px;" title="Add New"></a> -->
					<?php endif; ?>
			        
		    	</div>
		        <div>
			        <select class="form-control" name="religion" id="religion">
			        	<option value="">Select Religion</option>
			            <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				            <option value="<?php echo e($religion->OID); ?>"><?php echo e($religion->Name); ?></option>
			            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			        </select>
			        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit demographics')): ?>
			        	<!-- <a href="<?php echo e(route('newreligionform')); ?>" id="addreligion" > <img src="images/add1.png" style="width: 15px; float: left; margin: 7px 5px;" title="Add New"></a> -->
			        <?php endif; ?>
		    	</div>
		        
	        </div>
	        <!-- Address information-->
        	<div style="display: inline-block; min-width: 200px; margin-right:15px; vertical-align: top;width: 20%;">
        		<h2 class="fs-title">ADDRESS INFORMATION</h2>
        		<div>
		        	<select class="form-control" name="country" id="country">
			        	<option value="">Select Country</option>
			            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				            <option value="<?php echo e($country->OID); ?>"><?php echo e($country->Name); ?></option>
			            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			        </select>
			        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit demographics')): ?>
			        	<!-- <a href="<?php echo e(route('newcountryform')); ?>" id="addcountry"> <img src="images/add1.png" style="width: 15px; float: left; margin: 7px 5px;" title="Add New"></a> -->
			        <?php endif; ?>
			    </div>

			    <div>
			        <select class="form-control" name="district" id="district">
			        	<option value="">Select District</option>
			        </select>
			        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit demographics')): ?>
			        	<!-- <a href="<?php echo e(route('newdistrictform')); ?>" id="adddistrict" > <img src="images/add1.png" style="width: 15px; float: left; margin: 7px 5px;" title="Add New"></a> -->
			        <?php endif; ?>
			    </div>

			    <div>
			        <select class="form-control" name="county" id="county">
			        	<option value="">Select County</option>
			        </select>
			        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit demographics')): ?>
			        	<!-- <a href="<?php echo e(route('newcountyform')); ?>" id="addcounty" > <img src="images/add1.png" style="width: 15px; float: left; margin: 7px 5px;" title="Add New"></a> -->
			        <?php endif; ?>
			    </div>

			    <div>
			        <select class="form-control" name="subcounty" id="subcounty">
			        	<option value="">Select Subcounty</option>
			        </select>
			        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit demographics')): ?>
			        	<!-- <a href="<?php echo e(route('newsubcountyform')); ?>" id="addsubcounty" > <img src="images/add1.png" style="width: 15px; float: left; margin: 7px 5px;" title="Add New"></a> -->
			        <?php endif; ?>
			    </div>

			    <div>
			        <select class="form-control" name="parish" id="parish">
			        	<option value="">Select Parish</option>
			        </select>
			        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit demographics')): ?>
			        	<!-- <a href="<?php echo e(route('newparishform')); ?>" id="addparish" > <img src="images/add1.png" style="width: 15px; float: left; margin: 7px 5px;" title="Add New"></a> -->
			        <?php endif; ?>
			    </div>

			    <div>
			        <select class="form-control" name="village" id="village" ><!--  style="float:left; width:80%;" -->
			        	<option value="">Select Village</option>
			        </select>
			        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit demographics')): ?>
			        	<!-- <a href="<?php echo e(route('newvillageform')); ?>" id="addvillage" > <img src="images/add1.png" style="width: 15px; float: left; margin: 7px 5px;" title="Add New"></a> -->
			        <?php endif; ?>
			    </div>

		        <input type="text" name="street" placeholder="Street" value="<?php echo e(old('street')); ?>"/>
		        <?php if($errors->has('street')): ?>
		              <span class="error"><?php echo e($errors->first('street')); ?></span>
		        <?php endif; ?> 		        
	        </div>

	        <div style="display: inline-block; min-width: 200px; vertical-align: top; margin-right:15px;width: 20%;">
	        	<input type="text" name="zone" placeholder="Zone" value="<?php echo e(old('zone')); ?>"/>
		        <?php if($errors->has('zone')): ?>
		              <span class="error"><?php echo e($errors->first('zone')); ?></span>
		        <?php endif; ?> 

		        <input type="text" name="landlord" placeholder="Landlord" value="<?php echo e(old('landlord')); ?>"/>
		        <?php if($errors->has('landlord')): ?>
		              <span class="error"><?php echo e($errors->first('landlord')); ?></span>
		        <?php endif; ?> 

		        <input type="text" name="prominentleader" placeholder="Prominent Leader" value="<?php echo e(old('prominentleader')); ?>"/>
		        <?php if($errors->has('prominentleader')): ?>
		              <span class="error"><?php echo e($errors->first('prominentleader')); ?></span>
		        <?php endif; ?> 

		        <input type="text" name="neighbour" placeholder="Neighbour/Feature/Landmark" value="<?php echo e(old('neighbour')); ?>"/>
		        <?php if($errors->has('neighbour')): ?>
		              <span class="error"><?php echo e($errors->first('neighbour')); ?></span>
		        <?php endif; ?> 

		        <input type="text" name="commonname" placeholder="Common Name" value="<?php echo e(old('commonname')); ?>"/>
		        <?php if($errors->has('commonname')): ?>
		              <span class="error"><?php echo e($errors->first('commonname')); ?></span>
		        <?php endif; ?>
		        <select class="form-control" name="IDIStaffIndentification" >
		        	<option value="">Identify IDI Staff as</option>
		            <option value="1">IDI Staff</option>
		            <option value="2">Mulago Staff</option>
		            <option value="3">Friends</option>
		            <option value="4">Coworkers</option>
		            <option value="5">Others Specify</option>
		        </select>

		        <input type="text" name="otherIDIStaffIndentification" placeholder="Other Identify IDI Staff" value="<?php echo e(old('otherIDIStaffIndentification')); ?>"/>
		        <?php if($errors->has('otherIDIStaffIndentification')): ?>
		              <span class="error"><?php echo e($errors->first('otherIDIStaffIndentification')); ?></span>
		        <?php endif; ?> 
	        </div>
	        <div style="display: inline-block; min-width: 200px; vertical-align: top;width: 20%;">
		        <select class="form-control" name="visitingproblem" >
		        	<option value="">Problem With Visiting</option>
		            <option value="1">Yes</option>
		            <option value="2">No</option>
		        </select>

		        <textarea name="detaileddirection" placeholder="Detailed Direction" value="<?php echo e(old('detaileddirection')); ?>"></textarea>
		        <?php if($errors->has('detaileddirection')): ?>
		              <span class="error"><?php echo e($errors->first('detaileddirection')); ?></span>
		        <?php endif; ?>

		        <img id="image_preview_container" src="images/avatar.png" alt="preview image" style=" max-height:150px; border:solid 1px #ccc; margin: 15px 0;">
		        <label for="patientimage" class="btn btn-primary btn-block btn-outlined" style="font-size:0.8em;letter-spacing: 1px;">Upload/Capture image</label>
		        <input type="file" id="patientimage"  name="patientimage" placeholder="Select image" value="<?php echo e(old('patientimage')); ?>" style="display: none" onchange="document.getElementById('image_preview_container').src = window.URL.createObjectURL(this.files[0])"/>
		        <?php if($errors->has('patientimage')): ?>
		              <span class="error"><?php echo e($errors->first('patientimage')); ?></span>
		        <?php endif; ?> 
		        
		        <a href="" style="cursor: pointer;" class="small" data-toggle="modal" data-target="#phoneform" id="addphonebutton"><img src="images/addphone.png" style="width:25px; margin-right:10px;" />Add Phone</a>
	        </div>
	    </div>
	    <div style="width:inherit; height: auto; padding:5px 10px; left:0; z-index: 1;">
	        <h2 class="fs-title">CONTACT INFORMATION</h2>
	        <div class="limiter">
				<div class="container-table100">
					<div class="wrap-table100">
						<div class="table100 ver1 m-b-110">
							<div class="table100-head">
								<table id="phoneresults">
									<thead>
										<tr class="row100 head">
											<th class="cell100 column1" >Phone Number</th>
											<th class="cell100 column1" >Self</th>
											<th class="cell100 column2" >Name</th>
											<th class="cell100 column1" >Relationship</th>
											<th class="cell100 column1" >Contacted</th>
											<th class="cell100 column1" >Disclosed</th>
											<th class="cell100 column2" >Description</th>
											<th class="cell100 column3" ></th>
										</tr>
									</thead>
								</table>
							</div>
							<div class="table100-body js-pscroll phoneresults">
								<table><tbody></tbody></table>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    <!-- </fieldset> -->
    <div class="modal-footer">
	    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	    <input type="submit" name="submit" class="submit phonesubmit action-button" value="Save" id="saveclient" style="float:left;" />
	</div>
</form>
 
<script type="text/javascript">
//save client
    $('form.detailsform').on('submit', function(e) {
        e.preventDefault();
        var form = new FormData(document.getElementById('msform'));
        var patientimage = document.getElementById('patientimage').files[0];
        if (patientimage) {   
            form.append('patientimage', patientimage);
        }
        $.ajax({
            type: 'post',
            url: '<?php echo e(route("createclient")); ?>',
            data: form,
            processData: false,
            contentType: false,
            success: function(result)
            {
            	toastr.success('client Details Saved.<br> IDCNO:'+ result.IDCNO+' <br>Name: '+result.FirstName+' '+result.Surname);
            },
            error: function(){},
        });
    $('#mymodal2').modal('hide');
    });
</script>
<?php /**PATH C:\xampp\htdocs\OpenICEA\modules/Patient\Resources/views/registry/newclient.blade.php ENDPATH**/ ?>