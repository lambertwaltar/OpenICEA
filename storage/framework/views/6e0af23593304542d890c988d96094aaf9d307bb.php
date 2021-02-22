<style type="text/css">
	#settingstable label{
		margin-bottom: 0 !important;
	}
	#settingstable td{
		/* padding: 0 !important; */
	}

</style>
<div class="limiter">
	<div class="container-table100">
		<div class="wrap-table100">
			<div class="table100 ver1 m-b-110" style="padding-top:0 !important">
				<div class="table100-body js-pscroll">
					<table id="settingstable">
						<tbody>
							<tr class="row100 head" style="height:30px; text-align: center;font-size:0.9em; line-height: 1.5 !important;font-family: montserrat; ">
								<th class="cell100 column3" >Setting</th>
								<th class="cell100 column5" >Description</th>
								<th class="cell100 column3" >Status</th>
								<th class="cell100 column3" ></th>
							</tr>
							<?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr class="row100 body clickable-row" style="color:#000000; text-align: center;font-size:0.9em; line-height: 1.5 !important;font-family: montserrat;">
								<td class="cell100 column3"><input type="hidden" name="settingid" value="<?php echo e($setting->OID); ?>"><?php echo e($setting->Name); ?></td>
								<td class="cell100 column5"><?php echo e($setting->Description); ?></td>
								<td class="cell100 column3" id="status"><?php echo e($setting->Status); ?></td>
								<td class="cell100 column3" id="settingaction">
									<?php if($setting->Status =="Disabled"): ?>
										<label class="action" id="Enabled" style="cursor: pointer; color:#1b89b5;">Enable</label>
							        <?php else: ?>
							        	<label class="action" id="Disabled" style="cursor: pointer; color:#1b89b5;">Disable</label>
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
	
	<span class="error" style="display:none;"></span>
</form>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal" style="padding: 4px 10px;border-radius: 3px;">Close</button>
</div>


<script type="text/javascript">
	$(document).on('click','.action',function(e){
		//e.preventDefault();
		e.stopImmediatePropagation();
		var href = $(this).attr('href');
		var status = $(this).attr('id');
		var id = $('input[name=settingid]').val();

		 $.ajax({
            type: 'get',
            url: '<?php echo e(route("rasetting")); ?>',
            data:{'status':status,'id':id},
            success: function(data)
            {  
            	for(var i=0;i<data.length;i++){
            		$('input[name=settingid]').val(data[i].OID);
            		$('#status').text(data[i].Status);
            		if(data[i].Status==="Disabled"){
            			$('#settingaction').html('').append('<label class="action" id="Enabled" style="cursor: pointer; color:#1b89b5;">Enable</label>')
            		}
            		else{
            			$('#settingaction').html('').append('<label class="action" id="Disabled" style="cursor: pointer; color:#1b89b5;">Disable</label>');
            		}
            		

            	}                            
               
            }

        });


	});
</script><?php /**PATH C:\xampp\htdocs\OpenICEA\modules/User\Resources/views/management/settings.blade.php ENDPATH**/ ?>