<?php $__env->startSection('title'); ?> OpenICEA <?php $__env->stopSection(); ?>
<?php $__env->startSection('heading'); ?>
<!--<img src="images/edituser.png" style="width:4%;"> --><font class="page-heading"></font>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('links'); ?>
	<style>
		select{

	    font-family: montserrat !important;
	    font-size: 13px !important;
	    height: calc(1.5em + .75rem + 1px) !important;
	    margin-bottom: 10px;
		}

		input[type="date"]:before {
	    content: attr(placeholder) !important;
	    color: #aaa;
	    margin-right: 0.5em;
		}
		input[type="date"]:focus:before,
		input[type="date"]:valid:before {
		content: "";
		}

		.state label{
			font-family: montserrat;
			font-size:0.8em;
		}
		.pretty .state label:before,label:after {
		    top: 1px !important;
		}

		#reasontable{
			font-family: montserrat;
		    font-size: 0.9em;
		    color: #2C3E50;
		    border: solid 1px #ccc;
		    padding: 10px;
		    width:auto;
		}
		#reasontable td{
			padding-left:10px;
		}


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
		.container-table100 {
	    padding:0 !important;
		}
		.table100.ver1 th {
	    line-height: 0.1 !important;
		}
		.mb-4, .my-4 {
	     margin-bottom: 0.5rem!important; 
		}
		.table100-body td {
	    padding-top: 0 !important;
	    padding-bottom: 0 !important;
	    color: #4a7c91 !important;
		}

		.column1 {
	    width: 12%;
	    padding-left: 0px;
		}

		#patientdetailstable {
	    position: relative;
	    padding: 5px !important;
		}

		#patientdetailstable th{
	    	color: #808080;
			background: #f0f1f2 !important;
			padding-left: 2%;
			line-height: 2.9 !important;
		}
		h2{
			text-align: center !important;
			padding: 10px 0 !important;
		}		
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
		  -webkit-appearance: none;
		  margin: 0;
		}

		#patientencounters tr {
		    background-color: #eee;
		    border-top: 1px solid #fff;
		    font-size:0.9em;
		}
		#patientencounters tr:hover {
		    background-color: #bad1cf;
		}

		#patientencounters td:hover {
		    cursor: pointer;
		}
		.prescription_table td{
			font-family: montserrat;
		    font-size: 0.7em;
		    color: #2C3E50;
		    text-align:left;
		}

		.label{
			width:40%;
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

		#encounterprescriptions tr{
			line-height: 2;
		}
		.nav-tabs a{
			padding: 5px 2px;
			font-size: 0.8em !important;
		}

		.nav-link.active{
			background-color: #919191 !important;
			font-size: 0.7em;
			padding: 5px 8px;
			color: #ffffff !important;
		}

		#triagetable {
	    position: relative;
	    padding: 5px !important;
		}
		#triagetable th{
	    	color: #808080;
			background: #f0f1f2 !important;
			padding-left: 2%;
			line-height: 2.4 !important;
		}

		.highcharts-credits{
			display:none
		}
	</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['view clients','edit clients','delete clients','manage encounters','manage prescriptions','make lab requests'])): ?>

	<div style="width:100%; height: auto; margin:0 auto">
		<!-- Div 1 -->
		<div style="width:73%; height: auto; display: inline-block; margin:0 auto; vertical-align: top; margin-bottom:20px;">
			<!-- Patient Information -->
			<div style=" border-radius:5px; margin:10px;">
				<!-- Search form -->
                    <form id="searchform" method="get">
                      <input type="number" name="patientsearch" id="patientsearch" placeholder=" Enter Client Number" style="-moz-appearance: textfield;" autofocus>
                      <!-- <input type="button" name="submit" class="action-button" value="Search" id="search" /> -->
                    </form>
                <!-- Search form -->
				<span class="error" style='display:none;'></span>
				<!-- <h2 class="fs-title">CLIENT INFORMATION</h2> -->
				<div class="limiter" style="clear:both; width:100%;">
					<div class="container-table100">
						<div class="wrap-table100">
							<div class="table100 ver1 m-b-110" id="patientdetailstable">
								<div class="table100-head">
								</div>
								<div class="table100-body js-pscroll">
									<table ><tbody>
										<tr class="row100 body clickable-row">
											<th class="cell100 column3" >Client Number</th><td class="cell100 column1" id="home_idcno"></td>
											<th class="cell100 column3" >Religion</th><td class="cell100 column1" id="home_religion"></td>
											<th class="cell100 column3" >Subcounty</th><td class="cell100 column1" id="home_subcounty"></td>
										</tr>
										<tr class="row100 body clickable-row">
											<th class="cell100 column3" >Name</th><td class="cell100 column1" id="home_name"></td>
											<th class="cell100 column3" >Marital Status</th><td class="cell100 column1" id="home_marital"></td>
											<th class="cell100 column3" >Parish</th><td class="cell100 column1" id="home_parish"></td>
										</tr>
										<tr class="row100 body clickable-row">
											<th class="cell100 column5">Registration Date</th><td class="cell100 column1" id="home_regdate"></td>
											<th class="cell100 column5" >Follow-up Status</th><td class="cell100 column1" id="home_followup"></td>
											<th class="cell100 column3" >Village</th><td class="cell100 column1" id="home_village"></td>
										</tr>
										<tr class="row100 body clickable-row">
											<th class="cell100 column3" >Birth Date</th><td class="cell100 column1" id="home_dob"></td>
											<th class="cell100 column3" >Contacts</th><td class="cell100 column1" id="home_contact"></td>
											<th class="cell100 column3" >Zone</th><td class="cell100 column1" id="home_zone"></td>
										</tr>
										<tr class="row100 body clickable-row">
											<th class="cell100 column3" >Gender</th><td class="cell100 column1" id="home_gender"></td>
											<th class="cell100 column3" >Country</th><td class="cell100 column1" id="home_country"></td>
											<th class="cell100 column3" >Street</th><td class="cell100 column1" id="home_street"></td>
										</tr>
										<tr class="row100 body clickable-row">
											<th class="cell100 column3" >Has ID</th><td class="cell100 column1" id="home_hasid"></td>
											<th class="cell100 column3" >District</th><td class="cell100 column1" id="home_district"></td>
											<!-- <td class="cell100 column1"></td> -->
										</tr>
										<tr class="row100 body clickable-row">
											<th class="cell100 column3" >Tribe</th><td class="cell100 column1" id="home_tribe"></td>
											<th class="cell100 column3" >County</th><td class="cell100 column1" id="home_county"></td>
											<td class="cell100 column1" id="patientactions"  colspan="2" align="right"></td>
										</tr>
									</tbody></table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Visit Information -->
			<div style=" border-radius:5px; margin-top:1%; ">
				<div class="limiter">
					<div class="container-table100">
						<div class="wrap-table100">
							<div class="table100 ver1 m-b-110">
								<div class="table100-head">
									<table>
										<thead>
											<tr class="row100 head">
												<th class="cell100 column1" style="width: 8%;">Visit Date</th>
												<th class="cell100 column1" >Next Appointment Date</th>
												<th class="cell100 column1" style="width: 8%;">Return Time</th>
												<th class="cell100 column1" style="width: 5%;" >IsPrivate</th>
												<th class="cell100 column1" >Visit Type</th>
												<th class="cell100 column1" >Reasons</th>
												<th class="cell100 column1" style="width: 5%;">Visitor</th>
												<th class="cell100 column1" style="width: 5%;"></th>
												<th class="cell100 column1" style="width: 5%;"></th>
											</tr>
										</thead>
									</table>
								</div>
								<div class="table100-body js-pscroll" id="encounters">
									<table id="patientencounters">
										<tbody>
											<tr class="row100 body clickable-row"><td class="cell100 column1" style='width: 8%;'></td></tr>	
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
			<div style="margin-top:20px;padding:10px !important; border: solid 1px #ccc;">
				<?php echo $__env->make('patient::registry.charts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>
		</div>
		<!-- Div 1 -->
		<div style="width:26%; height: auto; display: inline-block; margin:0 auto; vertical-align: top;">
			<!-- Photograph -->
			<div style=" border-radius:5px; margin:10px;text-align: center; ">
				<!-- <h2 class="fs-title">PHOTOGRAPH</h2> -->
				<img id="home_image_preview_container" src="images/avatar.png" alt="preview image" style=" max-height:200px; max-width: 320px; border:solid 1px #ccc; " id="patientimage">
			</div>
			<!-- Notifications -->
			<div style="height: auto background: #f0f1f2; margin:10px;">
				<h2 class="fs-title" style="background: #999999;color: #FFFFFF; margin-bottom: 0;">TRIAGE DETAIL</h2>
				<div class="limiter">
					<div class="container-table100">
						<div class="wrap-table100">
							<div class="table100 ver1 m-b-110 triagedetail" id="triagetable">
								<div class="table100-body js-pscroll">
									<table style="min-height:100px !important;"><tbody>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1" colspan="2" align="center" style="font-size: 0.7em;">Select an encounter to view details</td>
										</tr>
										<tr class="row100 body clickable-row">
											<th class="cell100 column1" >Triage Date</th><td class="cell100 column1" id="triagedate"></td>
										</tr>
										<tr class="row100 body clickable-row">
											<th class="cell100 column1" >Blood Pressure</th><td class="cell100 column1" id="bp"></td>
										</tr>
										<tr class="row100 body clickable-row">
											<th class="cell100 column1">Temperature</th><td class="cell100 column1" id="hometemp"></td>
										</tr>
										<tr class="row100 body clickable-row">
											<th class="cell100 column1" >Weight</th><td class="cell100 column1" id="homeweight"></td>
										</tr>
										<tr class="row100 body clickable-row">
											<th class="cell100 column1" >Height</th><td class="cell100 column1" id="homeheight"></td>
										</tr>
										<tr class="row100 body clickable-row">
											<th class="cell100 column1" >MUAC</th><td class="cell100 column1" id="homemuac"></td>
										</tr>
										<tr class="row100 body clickable-row">
											<th class="cell100 column1" >BMI</th><td class="cell100 column1" id="homebmi" style="color:#FFFFFF !important;"></td>
										</tr>
									
									</tbody></table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

<?php endif; ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('patient::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenICEA\modules/Patient\Resources/views/registry/home.blade.php ENDPATH**/ ?>