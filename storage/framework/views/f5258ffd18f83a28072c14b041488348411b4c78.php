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
		border-radius: 0 !important;
		}
		.table100-head th {
		    padding-top: 12px !important;
		    padding-bottom: 12px !important;
		}
		.prescription_table{
			border-collapse: separate;
    		border-spacing: 2px;
		}
		.prescription_table td{
			font-family: montserrat;
		    font-size: 0.8em;
		    color: #2C3E50;
		    text-align:left;
		    margin-bottom: 5px;
		    white-space: nowrap;
		}
		.prescription_table input,select{
			padding: 2px !important;
    		padding-left: 5px !important;
		}
		.prescription_table select{
			height: 2em !important;;
		}

		.prescription_table th {
		    padding-top: 12px !important;
		    padding-bottom: 12px !important;
		    text-align:left;
		}

		.prescription_table .state label {
		    font-size:1.1em !important;
		}
		.prescription_table .pretty {
		    margin-bottom: 10px;
		}
		input[readonly],textarea[readonly]{
			background:#f2f2f2;
		}
		select{

	    font-family: montserrat !important;
	    font-size: 13px !important;
	    height: calc(1.5em + .75rem + 1px) !important;
	    margin-bottom: 10px;
	    width: 100%;
		}

		.pretty .state label:before,label:after {
		    top: 1px !important;
		    margin-top: -2px;
		    left: 70px;
		}

		.nav-tabs a{
			padding: 5px 2px;
			font-size: 12px !important;
		}

		.nav-link.active{
			background-color: #919191 !important;
			font-size: 0.7em;
			padding: 5px 8px;
			color: #ffffff !important;
		}

	</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
	<!--<img src="images/user.png" style="width:4%;"> --><font class="page-heading">LAB REQUISITIONS</font>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div style="width:100%;">
	<!-- Search form -->
        <form id="searchform" method="get" style="margin-top:10px !important; margin-left:10px !important;">
          <input type="date" name="labrequisitionsearch" id="labrequisitionsearch" style="padding:2px;" autofocus>
          <input type="button" name="submit" class="action-button" value="Go" id="go" />
        </form>
    <!-- Search form -->
	<div class="limiter" style="display: inline-block; width:75%; float: left;">
		<div class="container-table100" style="padding:10px 0px !important;">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1" style="padding-left:10px;">Visit Date</th>
									<th class="cell100 column5">Order Date</th>
									<th class="cell100 column5">Order Time</th>
									<th class="cell100 column2">Ordered By</th>
									<th class="cell100 column5">Sample Types</th>
									<th class="cell100 column5">Tests</th>
									<th class="cell100 column5">Sample Collected</th>
									<th lass="cell100 column5"></th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll" id="labtablebody">
						<table>
							<tbody>
	                      		<?php $__currentLoopData = $requisitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requisition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr class="row100 body clickable-row">
										<input type="hidden" value="<?php echo e($requisition->OID); ?>" />
										<td class="cell100 column1"><?php echo e($requisition->rencounter->visitDate); ?></td>
										<td class="cell100 column5"><?php echo e($requisition->OrderDate); ?></td>
										<td class="cell100 column5"><?php echo e($requisition->OrderedTime); ?></td>
										<td class="cell100 column2"><?php echo e($requisition->rprovider->FirstName.' '.$requisition->rprovider->LastName); ?></td>
										<td class="cell100 column5">
											 <?php $__currentLoopData = $requisition->requisitiontest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sample): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($sample->labsample->Name); ?>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</td>
										<td class="cell100 column5">
											<?php $__currentLoopData = $requisition->requisitiontest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($test->TestName); ?>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</td>
										<td class="cell100 column5" align="center">
											<?php if($requisition->SampleCollected =="1" || $requisition->SampleCollected =="2"): ?>
												<input type="checkbox" checked readonly>
											<?php else: ?>
												<input type="checkbox" readonly>
											<?php endif; ?>
										</td>
										<td class="cell100 column5" align="center">
											<?php if($requisition->SampleCollected =="1"): ?>
												<a style="display:inline-block;" href="<?php echo e(route('submitgenresults', ['id' => Crypt::encrypt($requisition->OID)])); ?>" id="General Requisition Results" onclick="labdialog(this); return false;"> <img src="images/labresult2.png" title="Enter General Results" style="height:25px;" /></a>

												<a href="<?php echo e(route('submithivresults', ['id' => Crypt::encrypt($requisition->OID)])); ?>" id="HIV Screening Requisition Results" onclick="labdialog(this); return false;"> <img src="images/cube_molecule_view.png" title="Enter HIV Results" style="height:25px;"/></a>
											<?php elseif($requisition->SampleCollected =="2"): ?>
												<a class="editlabResult" href="<?php echo e(route('editresults', ['id' => Crypt::encrypt($requisition->OID)])); ?>" id="Edit Lab Results" onclick="editlabresult(this); return false;"> Edit Results</a>
											<?php else: ?>
												<a href="<?php echo e(route('collectsample', ['id' => Crypt::encrypt($requisition->OID)])); ?>" id="Lab Collections" onclick="labdialog(this); return false;"><img src="images/sample1.png" title="Collect Sample" style="width:20px;" /></a>
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
	<div style="min-height: 15rem; background: #f0f1f2; margin:10px; display: inline-block; width:23%">
		<h2 class="fs-title" style="background: #999999;color: #FFFFFF; padding:10px; text-align:center;">NOTIFICATIONS
			<?php if(auth()->user()->unreadNotifications->count()): ?>
              <span class="badge badge-light badge-counter"></span>
            <?php endif; ?> 
		</h2>
		<!-- <div></div> -->
		 	<ul class="nav navbar-nav flex-nowrap ml-auto notifications" id="menu-container" >
              	<div class="d-none d-sm-block topbar-divider"></div>
            </ul>
	</div>
</div>

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
            $('input[name="labrequisitionsearch"]').val([year, month, day].join('-'));

        });
    //date search
        $(document).on('click','#go',function(e){
        	e.preventDefault();
        	var date = $('#labrequisitionsearch').val();
        	$("#labtablebody").load('<?php echo e(route("labrequisitions",["date"=>""])); ?>'+date+ ' #labtablebody');
        });

    //edit Results dialog   
	    function editlabresult(r){
            var href = r.getAttribute("href");
            var id = r.getAttribute("id");
            $('#partial2').load(href,function(){
                $('#mymodal2').modal({show:true});
                $('#mymodal2 .modal-dialog').addClass("modal-lg");
                $('#mymodal2 .modal-title').text(id);
                //$('#mymodal2 .modal-dialog').css("max-width",'600px');
                
                return;
            }); 
        }
</script>

<?php $__env->stopSection(); ?>

<script type="text/javascript">
	
</script>

<?php echo $__env->make('user::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenICEA\modules/Laboratory\Resources/views/labrequisitions.blade.php ENDPATH**/ ?>