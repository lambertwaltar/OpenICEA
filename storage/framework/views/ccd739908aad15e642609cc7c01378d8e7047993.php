<?php $__env->startSection('title'); ?> OpenICEA | Admin <?php $__env->stopSection(); ?>
<?php $__env->startSection('heading'); ?>
<font class="page-heading">MASTER LISTS</font>
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

		#msform {
			width: auto !important;
			margin: 20px auto;
		}

		#msform .action-button {
			width: auto !important;
			padding: 10px 20px !important;
			font-weight: 200;
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
		.table100.ver1 td {
			line-height: 2.5 !important;
		}
		.mb-4, .my-4 {
			margin-bottom: 0.5rem!important; 
		}
		.table100-body td {
			padding-top: 0 !important;
			padding-bottom: 0 !important;
		}

		.column1 {
			width: 10%;
			padding-left: 0px;
		}

		.modal-footer {
			border-top: none;
		}
		#drugtable{
			font-family: montserrat;
			font-size: 0.9em;
			color: #2C3E50;
			border: solid 1px #ccc;
			padding: 10px;
			width:auto;
		}
		#drugtable td{
			padding-left:10px;
		}
		.prescription_table td{
			font-family: montserrat;
			font-size: 0.8em;
			color: #2C3E50;
			text-align:left;
		}

	</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div style="width:100%; height: auto; margin:0 auto; padding:15px;">
	
	<!-- Div 1 -->
<div style="text-align: right; margin-right:20px; font-size:0.9em;">Export:
	<a id="excel" style="color:#007bff;padding:5px; border-radius:3px;cursor: pointer;">Excel</a> <font style="color:#ccc">| </font>
	<a id="pdf" style="color:#007bff;padding:5px; border-radius:3px; cursor: pointer;" onclick="saveDiv('myCanvas','Title'); return false">pdf</a>
</div>

	<div style="width:25%; height: auto; display: inline-block; margin:0 auto; vertical-align: top;">

		<!-- Visit Information -->
		<div style=" border-radius:5px; margin:10px; margin-top:1%; ">
			<div class="limiter">
				<div class="container-table100">
					<div class="wrap-table100">
						<div class="table100 ver1 m-b-110">
							<div class="table100-head">
								<table>
									<thead>
										<tr class="row100 head"><th class="cell100 column1" >Function</th></tr>
									</thead>
								</table>
							</div>
							<div class="table100-body js-pscroll" style="height: 25em;">
								<table id="masterlisttable">
									<tbody>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="tribe">Tribe</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="religion">Religion</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="country">Country</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="district" >District</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="county">County</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="subcounty">Subcounty</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="parish">Parish</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="village">Village</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="role">Roles</a></td>
										</tr>
										<!-- <tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="permission">Permissions</a></td>
										</tr> -->
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="appointmenttype">Appointment Type</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="drug">Drug</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="fundingsource">Funding Source</a></td>
										</tr>

										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="store">Store</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="schedule">Schedule</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="productgroup">Product Group</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="location">Location</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="condition"> Condition</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="unitdescription">Unit Description</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="unitofmeasurement">Unit of Measurement</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="dsdmtype">DSDM Type</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="regimen">Regimen</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="labtest">Lab Test</a></td>
										</tr>
										<tr class="row100 body clickable-row">
											<td class="cell100 column1"><a href="" id="sampletype">Sample Type</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
		<!-- Div 1 -->
	<div style="width:74%; height: auto; display: inline-block; margin:0 auto; vertical-align: top;" id="myCanvas">
		<div style=" border-radius:5px; margin:10px; margin-top:0.5%; ">
			<div class="limiter">
				<div class="container-table100">
					<div class="wrap-table100">
						<div class="table100 ver1 m-b-110">
							<div class="table100-head">
								<table>
									<thead>
										<tr class="row100 head">
											<th class="cell100 column1" id="itemheading">Items</th>
										</tr>
									</thead>
								</table>
							</div>
							<div class="table100-body js-pscroll" id="items" style="height: 25em;">
								<table id="itemcontents" class="table">
									<thead></thead>
									<!-- <th><tr class="row100 body clickable-row"></tr>
										<td class="cell100 column1"></td>
									</th> -->
									<tbody>
										<tr class="row100 body clickable-row"><td class="cell100 column1"></td></tr>	
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="txt">
<!-- <script src="<?php echo e(url('js/jspdf/jspdf.umd.min.js')); ?>"></script> -->
<!-- <script type="module" src="<?php echo e(url('js/jspdf/html.js')); ?>"></script> -->
<script>

	//export to pdf 1
		function saveDiv(divId, title) {
			var doc = new jsPDF({
			    orientation: 'landscape'
			});
			doc.setFont("courier");
			doc.setFontType("normal");
			doc.setFontSize(12);
			doc.text(20, 30,'');
			title =$('#pdf').attr('placeholder');
			var elementHTML = $('#myCanvas').html();
			var specialElementHandlers = {
			    '#pdf': function (element, renderer) {
			        return true;
			    }
			};
		
			doc.fromHTML(elementHTML, 25, 25, {
			    'width': elementHTML.width, // max width of content on PDF
			    'elementHandlers': specialElementHandlers
			},
			function(bla){doc.save(title+'.pdf');});
		}

		function printDiv(divId, title) {
		  	let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');
		  	mywindow.document.write(`<html><head><title>${title}</title>`);
		  	mywindow.document.write('</head><body >');
		  	mywindow.document.write(document.getElementById(divId).innerHTML);
		  	mywindow.document.write('</body></html>');

		 	mywindow.document.close(); // necessary for IE >= 10
		  	mywindow.focus(); // necessary for IE >= 10*/

		  	mywindow.print();
		  	mywindow.close();

		  	return true;
		}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-links'); ?>


<script type="text/javascript">

	//Export to Excel 2
		$(document).ready(function(){
		    $('#excel').click(function(e){
		    	e.preventDefault();
		        var data = $('#txt').val();
		        var name = $('#txt').attr('placeholder');
		        if(data == '')
		            return;
		        
		        JSONToCSVConvertor(data, name, true);
		    });
		});

		function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel) {
		    //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
		    var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
		    
		    var CSV = 'sep=,' + '\r\n\n';

		    //This condition will generate the Label/Header
		    if (ShowLabel) {
		        var row = "";
		        
		        //This loop will extract the label from 1st index of on array
		        for (var index in arrData[0]) {
		            
		            //Now convert each value to string and comma-seprated
		            row += index + ',';
		        }

		        row = row.slice(0, -1);
		        
		        //append Label row with line break
		        CSV += row + '\r\n';
		    }
		    
		    //1st loop is to extract each row
		    for (var i = 0; i < arrData.length; i++) {
		        var row = "";
		        
		        //2nd loop will extract each column and convert it in string comma-seprated
		        for (var index in arrData[i]) {
		            row += '"' + arrData[i][index] + '",';
		        }

		        row.slice(0, row.length - 1);
		        
		        //add a line break after each row
		        CSV += row + '\r\n';
		    }

		    if (CSV == '') {        
		        alert("Invalid data");
		        return;
		    }   
		    
		    //Generate a file name
		    var fileName = "OpenICEA_";
		    //this will remove the blank-spaces from the title and replace it with an underscore
		    fileName += ReportTitle.replace(/ /g,"_");   
		    
		    //Initialize file format you want csv or xls
		    var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
		    
		    // Now the little tricky part.
		    // you can use either>> window.open(uri);
		    // but this will not work in some browsers
		    // or you will not get the correct file extension    
		    
		    //this trick will generate a temp <a /> tag
		    var link = document.createElement("a");    
		    link.href = uri;
		    
		    //set the visibility hidden so it will not effect on your web-layout
		    link.style = "visibility:hidden";
		    link.download = fileName + ".csv";
		    
		    //this part will append the anchor tag and remove it after automatic click
		    document.body.appendChild(link);
		    link.click();
		    document.body.removeChild(link);
		}


</script>


<script type="text/javascript">
	var emptymarkup = "<tr class='row100 body clickable-row'><td class='cell100 column1' colspan='10'>No Items Found</td></tr>";
	var arv_nonarv = { 1:'ARV', 2:'Non-ARV',null:'---' };
	var yesno = { 1:'Yes', 2:'No',null:'---' };
	var check={1:'<input type="checkbox" style="margin-top: 10px;" checked>',null:'<input type="checkbox" style="margin-top: 10px;">'}
	var arv_nonarv = { 1:'ARV', 2:'Non-ARV',null:'---' };

	//Sorting the master list table
		$(document).ready(function () {
			var table, rows, switching, i, x, y, shouldSwitch;
			table = document.getElementById("masterlisttable");
			switching = true;
				/* Make a loop that will continue until
				no switching has been done: */
				while (switching) {
					// Start by saying: no switching is done:
					switching = false;
					rows = table.rows;
					/* Loop through all table rows (except the
					first, which contains table headers): */
					for (i = 0; i < (rows.length - 1); i++) {
					  	// Start by saying there should be no switching:
					  	shouldSwitch = false;
					  	/* Get the two elements you want to compare,
					  	one from current row and one from the next: */
					  	x = rows[i].getElementsByTagName("TD")[0];
					  	y = rows[i + 1].getElementsByTagName("TD")[0];
					  	// Check if the two rows should switch place:
					  	if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
					    	// If so, mark as a switch and break the loop:
					    	shouldSwitch = true;
					    	break;
					    }
					}
					if (shouldSwitch) {
					  /* If a switch has been marked, make the switch
					  and mark that a switch has been done: */
					  rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
					  switching = true;
					}
				}
			});

	//disable enter
		$('#mymodal').on('shown.bs.modal', function() {
			$(document).keypress(function(event){
					if (event.which == '13') {
						event.preventDefault();
					}
				});


		});

	// Creating Table Heads =thead
		function generateTableHead(table, heads) {
			table.deleteTHead();
			let thead = table.createTHead();
			let row = thead.insertRow();
			for (let key of heads) {
				let th = document.createElement("th");
				let text = document.createTextNode(key);
				th.appendChild(text);
				row.appendChild(th);
			}
		}

	//Tribes Modal
		//list tribes
		$('#tribe').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getalltribes")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Tribes');
							$('#pdf').attr('placeholder','OpenICEA-Tribes');
					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newtribeform')); ?>" id="addtribe">New Tribe</a></td></tr>';
					$('#itemheading').text("Tribes");
					var table = document.getElementById("itemcontents");
					var heads = ["Name", "Action"];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}
					$("#items table tbody").append(actions);
					if(data.length>=1)
					{	
						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletetribe")); ?>' id='deletetribe' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});


		$('#itemcontents').on('click', '#addtribe', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href+' #msform',function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New tribe');
				return;
			});
		});

		$('.modal-body').on('click', '#savetribe', function() {
			var name = $("input[name='tribename']").val();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("newtribe")); ?>',
				data: {'tribename':name},
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getalltribes")); ?>',
						data: {},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Tribes');
							$('#pdf').attr('placeholder','OpenICEA-Tribes');
							if(data.length>=1)
							{	
								$('#itemheading').text("Tribes");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}
								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newtribeform')); ?>"id="addtribe">New Tribe</a></td></tr>';
								$("#items table tbody").append(actions);

								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td class='cell100 column3'><a id='deletetribe' onclick='deletetribe(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});					
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//Religion Modal
		//list Religions
		$('#religion').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getallreligions")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Religions');
							$('#pdf').attr('placeholder','OpenICEA-Religions');
					$('#itemheading').text("Religions");
					var table = document.getElementById("itemcontents");
					var heads = ["Name"];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}

					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newreligionform')); ?>"id="addreligion">New Religion</a></td></tr>';
					$("#items table tbody").append(actions);

					if(data.length>=1)
					{	

						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletereligion")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});

		$('#itemcontents').on('click', '#addreligion', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href,function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Religion');
				return;
			});
		});

		$('#partial').on('click','#savereligion', function() {
			var name = $("input[name=religionname]").val();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("newreligion")); ?>',
				data: {'religionname':name},
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getallreligions")); ?>',
						data: {},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Religions');
							$('#pdf').attr('placeholder','OpenICEA-Religions');
							if(data.length>=1)
							{	
								$('#itemheading').text("Religions");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}

								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newreligionform')); ?>"id="addreligion">New Religion</a></td></tr>';
								$("#items table tbody").append(actions);

								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletereligion")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});								
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//country Modal
		//list Countries
		$('#country').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getcountries")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Countries');
							$('#pdf').attr('placeholder','OpenICEA-Countries');
					$('#itemheading').text("Countries");
					var table = document.getElementById("itemcontents");
					var heads = ["Name", "Action" ];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}

					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newcountryform')); ?>" id="addcountry">New Country</a></td></tr>';
					$("#items table tbody").append(actions);

					if(data.length>=1)
					{	

						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletecountry")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});
		$('#itemcontents').on('click','#addcountry', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href,function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Country');
				return;
			});
		});

		$('#partial').on('click','#savecountry', function() {
			var name = $("input[name=countryname]").val();
			if(name ===""){
				$(".error").css("display", "block");
				$('.error').text("This field is required"); 
				return;
			}
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("newcountry")); ?>',
				data: {'countryname':name},
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}

					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getcountries")); ?>',
						data: {},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Countries');
							$('#pdf').attr('placeholder','OpenICEA-Countries');
							if(data.length>=1)
							{	
								$('#itemheading').text("Countries");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}

								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newcountryform')); ?>"id="addreligion">New Religion</a></td></tr>';
								$("#items table tbody").append(actions);

								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletecountry")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});								
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(data){

				},
			});
		});

	//district Modal
		//list Districts
		$('#district').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getalldistricts")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Districts');
							$('#pdf').attr('placeholder','OpenICEA-Districts');
					$('#itemheading').text("Districts");
					var table = document.getElementById("itemcontents");
					var heads = ["Name","Country", "Action"];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}

					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newdistrictform')); ?>"id="adddistrict">New District</a></td></tr>';
					$("#items table tbody").append(actions);
					if(data.length>=1)
					{	


						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td class='cell100 column1'>"+data[i].dcountry.Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletedistrict")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});
		$('#itemcontents').on('click', '#adddistrict', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href,function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New District');
				return;
			});
		});

		$('#partial').on('click','#savedistrict', function() {
			var name = $("input[name=districtname]").val();
			var country = $( "select[name=country] option:selected" ).val();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("newdistrict")); ?>',
				data: {'districtname':name,'country':country},
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}

					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getalldistricts")); ?>',
						//data: {'id':country},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Districts');
							$('#pdf').attr('placeholder','OpenICEA-Districts');
							if(data.length>=1)
							{	
								$('#itemheading').text("Districts");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}

								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newdistrictform')); ?>"id="adddistrict">New District</a></td></tr>';
								$("#items table tbody").append(actions);

								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td class='cell100 column1'>"+data[i].dcountry.Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletedistrict")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});								
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//county Modal
		//list Counties
		$('#county').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getallcounties")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Counties');
							$('#pdf').attr('placeholder','OpenICEA-Counties');
					$('#itemheading').text("Counties");
					var table = document.getElementById("itemcontents");
					var heads = ["Name", "District", "Action" ];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}

					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newcountyform')); ?>"id="addcounty">New County</a></td></tr>';
					$("#items table tbody").append(actions);
					if(data.length>=1)
					{	

						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td  class='cell100 column1'>"+data[i]._district.Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletecounty")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});


		$('#itemcontents').on('click', '#addcounty', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href,function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New County');
				return;
			});
		});

		$('#partial').on('click','#savecounty', function() {
			var name = $("input[name=countyname]").val();
			var district = $( "select[name=district] option:selected" ).val();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("newcounty")); ?>',
				data: {'countyname':name,'district':district},
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getallcounties")); ?>',
						data: {'id':district},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Counties');
							$('#pdf').attr('placeholder','OpenICEA-Counties');
							if(data.length>=1)
							{	
								$('#itemheading').text("Counties");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}

								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newcountyform')); ?>"id="addcounty">New County</a></td></tr>';
								$("#items table tbody").append(actions);

								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td  class='cell100 column1'>"+data[i]._district.Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletecounty")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});								
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//subcounty Modal
		//list SubCounties
		$('#subcounty').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getallsubcounties")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Subcounties');
							$('#pdf').attr('placeholder','OpenICEA-Subcounties');
					$('#itemheading').text("Subcounties");
					var table = document.getElementById("itemcontents");
					var heads = ["Name","County", "Action" ];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}

					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newsubcountyform')); ?>"id="addsubcounty">New Subcounty</a></td></tr>';
					$("#items table tbody").append(actions);

					if(data.length>=1)
					{	

						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td  class='cell100 column1'>"+data[i]._county.Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletesubcounty")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});
		$('#itemcontents').on('click', '#addsubcounty', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href,function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Subcounty');
				return;
			});
		});

		$('#partial').on('click','#savesubcounty', function() {
			var name = $("input[name=subcountyname]").val();
			var county = $( "select[name=county] option:selected" ).val();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("newsubcounty")); ?>',
				data: {'subcountyname':name,'county':county},
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getallsubcounties")); ?>',
						data: {'id':county},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Subcounties');
							$('#pdf').attr('placeholder','OpenICEA-Subcounties');
							if(data.length>=1)
							{	
								$('#itemheading').text("Subcounties");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}

								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newsubcountyform')); ?>"id="addsubcounty">New Subcounty</a></td></tr>';
								$("#items table tbody").append(actions);

								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td  class='cell100 column1'>"+data[i]._county.Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletesubcounty")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});								
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});					

	//Parish Modal
		//list Parish
		$('tr').on('click', '#parish', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getallparishes")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Parishes');
							$('#pdf').attr('placeholder','OpenICEA-Parishes');
					$('#itemheading').text("Parishes");
					var table = document.getElementById("itemcontents");
					var heads = ["Name", "Subcounty", "Action" ];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}

					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newparishform')); ?>"id="addparish">New Parish</a></td></tr>';
					$("#items table tbody").append(actions);
					if(data.length>=1)
					{	

						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td  class='cell100 column1'>"+data[i]._subcounty.Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deleteparish")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});

		$('#itemcontents').on('click', '#addparish', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href,function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Parish');
				return;
			});
		});

		$('#partial').on('click','#saveparish', function() {
			var name = $("input[name=parishname]").val();
			var subcounty = $( "select[name=subcounty] option:selected" ).val();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("newparish")); ?>',
				data: {'parishname':name,'subcounty':subcounty},
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getallparishes")); ?>',
						data: {'id':subcounty},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Parishes');
							$('#pdf').attr('placeholder','OpenICEA-Parishes');
							if(data.length>=1)
							{	
								$('#itemheading').text("Parishes");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}
								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newparishform')); ?>"id="addparish">New Parish</a></td></tr>';
								$("#items table tbody").append(actions);

								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td  class='cell100 column1'>"+data[i]._subcounty.Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deleteparish")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});								
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//village Modal
		//list Parish
		$('#village').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getallvillages")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Villages');
							$('#pdf').attr('placeholder','OpenICEA-Villages');
					$('#itemheading').text("Villages");
					var table = document.getElementById("itemcontents");
					var heads = ["Name", 'Parish', "Action" ];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}

					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newvillageform')); ?>"id="addvillage">New Village</a></td></tr>';
					$("#items table tbody").append(actions);
					if(data.length>=1)
					{	


						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td  class='cell100 column1'>"+data[i]._parish.Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletevillage")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});
		$('#itemcontents').on('click', '#addvillage', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href,function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Village');
				return;
			});
		});

		$('#partial').on('click','#savevillage', function() {
			var name = $("input[name=villagename]").val();
			var parish = $( "select[name=parish] option:selected" ).val();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("newvillage")); ?>',
				data: {'villagename':name,'parish':parish},
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getallvillages")); ?>',
						data: {'id':parish},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Villages');
							$('#pdf').attr('placeholder','OpenICEA-Villages');
							if(data.length>=1)
							{	
								$('#itemheading').text("Villages");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}

								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newvillageform')); ?>"id="addvillage">New Village</a></td></tr>';
								$("#items table tbody").append(actions);
								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td  class='cell100 column1'>"+data[i]._parish.Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletevillage")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});							
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//Role Modal
		//list Roles
		$('#role').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getallroles")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
					$('#txt').attr('placeholder','Roles');
					$('#pdf').attr('placeholder','OpenICEA-Roles');
					$('#itemheading').text("Roles");
					var table = document.getElementById("itemcontents");
					var heads = ["Name", "Permissions", "Action" ];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}

					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('new_role')); ?>"id="addrole">New Role</a></td></tr>';
					$("#items table tbody").append(actions);
					if(data.length>=1)
					{	


						for (var i = 0; i < data.length; i++){
							var perm = data[i].permissions;
							var permissions = '';
							if(perm.length>0)
							{	
								for(var j=0;j<perm.length;j++){
									permissions+=perm[j].name +" | ";
								}
							}
							var id = data[i].id;
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +id+"'>"+data[i].name+"</td><td class='cell100'>"+permissions+"</td><td class='cell100 column3'><a href='<?php echo e(route("deleterole")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});
		$('#itemcontents').on('click','#addrole', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href,function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Role');
				return;
			});
		});


		$('.modal-body').on('click', '#saverole', function() {
			var name = $("input[name='rolename']").val();
			var permissions = $("select[name='duallistbox_demo1[]']").val();

			if(name =="" || permissions ==""){
				$(".error").css("display", "block");
				$('.error').text("Please fill in all the fields");
				return;
			}

			$.ajax({
				type: 'get',
				url: '<?php echo e(route("createrole")); ?>',
				data: {'rolename':name, 'permissions':permissions.toString()},
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getallroles")); ?>',
						data: {},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Roles');
							$('#pdf').attr('placeholder','OpenICEA-Roles');
							if(data.length>=1)
							{	
								$('#itemheading').text("Roles");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}

								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('new_role')); ?>"id="addrole">New Role</a></td></tr>';
								$("#items table tbody").append(actions);
								for (var i = 0; i < data.length; i++){
									var perm = data[i].permissions;
									var permissions = '';
									if(perm.length>0)
									{	
										for(var j=0;j<perm.length;j++){
											permissions+=perm[j].name +" | ";
										}
									}
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].id+"'>"+data[i].name+"</td><td class='cell100'>"+permissions+"</td><td class='cell100 column3'><a href='<?php echo e(route("deleterole")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
									
									
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});							
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//Permissions Modal
		//list Permissions
		$('#permission').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getallpermissions")); ?>',
				data: {},
				success: function(data){
					$('#itemheading').text("Permissions");
					var table = document.getElementById("itemcontents");
					var heads = ["Name", "Action"];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}

					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newpermission')); ?>"id="addpermission">New Permission</a></td></tr>';
					$("#items table tbody").append(actions);
					if(data.length>=1)
					{	

						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].id+"'>"+data[i].name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletepermission")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});
		$('#itemcontents').on('click','#addpermission', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href,function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Permission');
				return;
			});
		});


		$('.modal-body').on('click', '#savepermission', function() {
			var name = $("input[name='permissionname']").val();	

			if(name ==""){
				$(".error").css("display", "block");
				$('.error').text("Please fill in all the fields");
				return;
			}
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("createpermission")); ?>',
				data: {'permissionname':name},
				success: function(){
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getallpermissions")); ?>',
						data: {},
						success: function(data){
							if(data.length>=1)
							{	
								$('#itemheading').text("Permissions");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}

								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newpermission')); ?>"id="addpermission">New Permission</a></td></tr>';
								$("#items table tbody").append(actions);
								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].id+"'>"+data[i].name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletepermission")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});							
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});	

	//Appointment Type Modal
		//list Parish
		$('#appointmenttype').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getallappointmenttypes")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
					$('#txt').attr('placeholder','Appointment Types');
					$('#pdf').attr('placeholder','OpenICEA-Appointment Types');
					$('#itemheading').text("Appointment Types");
					var table = document.getElementById("itemcontents");
					var heads = ["Name", "Action"];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}

					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newappointmenttypeform')); ?>"id="addappointmenttype">New Appointment Type</a></td></tr>';
					$("#items table tbody").append(actions);


					if(data.length>=1)
					{	

						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deleteappointmenttype")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'>No Items Found</td></tr>";
						$("#items table tbody").append(markup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});
		$('#itemcontents').on('click', '#addappointmenttype', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href,function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Appointment Type');
				return;
			});
		});

		$('#partial').on('click','#saveappointmenttype', function() {
			var name = $("input[name=appointmenttypename]").val();
			if(name ==""){
				$(".error").css("display", "block");
				$('.error').text("Please fill in all the fields");
				return;
			}
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("createappointmenttype")); ?>',
				data: {'appointmenttypename':name},
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getallappointmenttypes")); ?>',
						data: {},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Appointment Types');
							$('#pdf').attr('placeholder','OpenICEA-Appointment Types');
							if(data.length>=1)
							{	
								$('#itemheading').text("Appointment Types");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}

								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newappointmenttypeform')); ?>"id="addappointmenttype">New Appointment Type</a></td></tr>';
								$("#items table tbody").append(actions);
								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deleteappointmenttype")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});							

						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//Store Modal
		//list Store
		$('#store').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getallstores")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
					$('#txt').attr('placeholder','Stores');
					$('#pdf').attr('placeholder','OpenICEA-Stores');
					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newstoreform')); ?>" id="addstore">New Store</a></td></tr>';
					$('#itemheading').text("Stores");
					var table = document.getElementById("itemcontents");
					var heads = ["Name", "IsMain", "Active", "Action"];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}
					$("#items table tbody").append(actions);
					if(data.length>=1)
					{	
						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td  class='cell100 column1'>"+check[data[i].IsMain]+"</td><td  class='cell100 column1'>"+check[data[i].Active]+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletestore")); ?>' id='deletetribe' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});


		$('#itemcontents').on('click', '#addstore', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href+' #msform',function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Store');
				return;
			});
		});

		$('.modal-body').on('click', '#savestore', function() {
			var form = new FormData(document.getElementById('msform'));
			$.ajax({
				type: 'post',
				url: '<?php echo e(route("createstore")); ?>',
				data: form,
				processData: false,
				contentType: false,
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getallstores")); ?>',
						data: {},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Stores');
							$('#pdf').attr('placeholder','OpenICEA-Stores');
							if(data.length>=1)
							{	
								$('#itemheading').text("Stores");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}
								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newstoreform')); ?>"id="addstore">New Store</a></td></tr>';
								$("#items table tbody").append(actions);

								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td  class='cell100 column1'>"+check[data[i].IsMain]+"</td><td  class='cell100 column1'>"+check[data[i].Active]+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletestore")); ?>' id='deletetribe' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});					
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//Funding Source Modal
		//list funding sources
		$('#fundingsource').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getallfundingsources")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
					$('#txt').attr('placeholder','Funding Sources');
					$('#pdf').attr('placeholder','OpenICEA-Funding Sources');
					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newfundingsourceform')); ?>" id="addfundingsource">New Funding Source</a></td></tr>';
					$('#itemheading').text("Funding Sources");
					var table = document.getElementById("itemcontents");
					var heads = ["Code", "Name", "Specifiable", "Action"];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}
					$("#items table tbody").append(actions);
					if(data.length>=1)
					{	
						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td  class='cell100 column1'>"+data[i].Code+"</td><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td  class='cell100 column1'>"+check[data[i].Specifiable]+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletefundingsource")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});


		$('#itemcontents').on('click', '#addfundingsource', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href+' #msform',function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Funding Source');
				return;
			});
		});

		$('.modal-body').on('click', '#savefundingsource', function() {
			var form = new FormData(document.getElementById('msform'));
			$.ajax({
				type: 'post',
				url: '<?php echo e(route("createfundingsource")); ?>',
				data: form,
				processData: false,
				contentType: false,
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getallfundingsources")); ?>',
						data: {},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Funding Sources');
							$('#pdf').attr('placeholder','OpenICEA-Funding Sources');
							if(data.length>=1)
							{	
								$('#itemheading').text("Funding Sources");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}
								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newfundingsourceform')); ?>" id="addfundingsource">New Funding Source</a></td></tr>';
								$("#items table tbody").append(actions);

								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td  class='cell100 column1'>"+data[i].Code+"</td><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td  class='cell100 column1'>"+check[data[i].Specifiable]+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletefundingsource")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});					
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//Conditions Modal
		//list conditions
		$('#condition').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getallconditions")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
					$('#txt').attr('placeholder','Conditions');
					$('#pdf').attr('placeholder','OpenICEA-Conditions');
					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newconditionform')); ?>" id="addcondition">New Condition</a></td></tr>';
					$('#itemheading').text("Conditions");
					var table = document.getElementById("itemcontents");
					var heads = ["Name", "Action"];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}
					$("#items table tbody").append(actions);
					if(data.length>=1)
					{	
						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletecondition")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});


		$('#itemcontents').on('click', '#addcondition', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href+' #msform',function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Condition');
				return;
			});
		});

		$('.modal-body').on('click', '#savecondition', function() {
			var form = new FormData(document.getElementById('msform'));
			$.ajax({
				type: 'post',
				url: '<?php echo e(route("createcondition")); ?>',
				data: form,
				processData: false,
				contentType: false,
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getallconditions")); ?>',
						data: {},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Conditions');
							$('#pdf').attr('placeholder','OpenICEA-Conditions');
							if(data.length>=1)
							{	
								$('#itemheading').text("Conditions");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}
								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newconditionform')); ?>" id="addcondition">New Condition</a></td></tr>';
								$("#items table tbody").append(actions);

								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletecondition")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});					
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//Location Modal
		//list Locations
		$('#location').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getalllocations")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
					$('#txt').attr('placeholder','Store Locations');
					$('#pdf').attr('placeholder','OpenICEA-Store Locations');
					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newlocationform')); ?>" id="addlocation">New Location</a></td></tr>';
					$('#itemheading').text("Locations");
					var table = document.getElementById("itemcontents");
					var heads = ["Name", "Store", "Action"];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}
					$("#items table tbody").append(actions);
					if(data.length>=1)
					{	
						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td  class='cell100 column1'>"+data[i].stores.Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletelocation")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});


		$('#itemcontents').on('click', '#addlocation', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href+' #msform',function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Location');
				return;
			});
		});

		$('.modal-body').on('click', '#savelocation', function() {
			var form = new FormData(document.getElementById('msform'));
			$.ajax({
				type: 'post',
				url: '<?php echo e(route("createlocation")); ?>',
				data: form,
				processData: false,
				contentType: false,
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getalllocations")); ?>',
						data: {},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Store Locations');
							$('#pdf').attr('placeholder','OpenICEA-Store Locations');
							if(data.length>=1)
							{	
								$('#itemheading').text("Locations");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}
								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newlocationform')); ?>" id="addlocation">New Location</a></td></tr>';
								$("#items table tbody").append(actions);

								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td  class='cell100 column1'>"+data[i].Store+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletelocation")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});					
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//Unit Description Modal
		//list unit desription
		$('#unitdescription').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getallunitdescreptions")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
					$('#txt').attr('placeholder','Unit Descriptions');
					$('#pdf').attr('placeholder','OpenICEA-Unit Descriptions');
					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newunitdescreptionform')); ?>" id="addunitdescription">New Unit Description</a></td></tr>';
					$('#itemheading').text("Unit Descriptions");
					var table = document.getElementById("itemcontents");
					var heads = ["Name", "ShortName", "Action" ];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}
					$("#items table tbody").append(actions);
					if(data.length>=1)
					{	
						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td  class='cell100 column1'>"+data[i].ShortName+"</td><td class='cell100 column3'><a href='<?php echo e(route("deleteunitdescreption")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});


		$('#itemcontents').on('click', '#addunitdescription', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href+' #msform',function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Unit Description');
				return;
			});
		});

		$('.modal-body').on('click', '#saveunitdescription', function() {
			var form = new FormData(document.getElementById('msform'));
			$.ajax({
				type: 'post',
				url: '<?php echo e(route("createunitdescreption")); ?>',
				data: form,
				processData: false,
				contentType: false,
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getallunitdescreptions")); ?>',
						data: {},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Unit Descriptions');
							$('#pdf').attr('placeholder','OpenICEA-Unit Descriptions');
							if(data.length>=1)
							{	
								$('#itemheading').text("Unit Descriptions");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}
								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newunitdescreptionform')); ?>" id="addunitdescription">New Unit Description</a></td></tr>';
								$("#items table tbody").append(actions);

								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td  class='cell100 column1'>"+data[i].ShortName+"</td><td class='cell100 column3'><a href='<?php echo e(route("deleteunitdescreption")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});					
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//Unit Of Measurement Modal
		//list units of measurement
		$('#unitofmeasurement').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getallunitsofmeasurement")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
					$('#txt').attr('placeholder','Units of Measurement');
					$('#pdf').attr('placeholder','OpenICEA-Units of Measurement');
					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newunitofmeasurementform')); ?>" id="addunitofmeasurement">New Unit of Measurement</a></td></tr>';
					$('#itemheading').text("Units of Measurement");
					var table = document.getElementById("itemcontents");
					var heads = ["Name", "ShortName", "Action"];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}
					$("#items table tbody").append(actions);
					if(data.length>=1)
					{	
						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td  class='cell100 column1'>"+data[i].ShortName+"</td><td class='cell100 column3'><a href='<?php echo e(route("deleteunitofmeasurement")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});


		$('#itemcontents').on('click', '#addunitofmeasurement', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href+' #msform',function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Unit of Measurement');
				return;
			});
		});

		$('.modal-body').on('click', '#saveunitofmeasurement', function() {
			var form = new FormData(document.getElementById('msform'));
			$.ajax({
				type: 'post',
				url: '<?php echo e(route("createunitofmeasurement")); ?>',
				data: form,
				processData: false,
				contentType: false,
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getallunitsofmeasurement")); ?>',
						data: {},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Units of Measurement');
							$('#pdf').attr('placeholder','OpenICEA-Units of Measurement');
							if(data.length>=1)
							{	
								$('#itemheading').text("Units of Measurement");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}
								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newunitofmeasurementform')); ?>" id="addunitofmeasurement">New Unit of Measurement</a></td></tr>';
								$("#items table tbody").append(actions);

								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td  class='cell100 column1'>"+data[i].ShortName+"</td><td class='cell100 column3'><a href='<?php echo e(route("deleteunitofmeasurement")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});					
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//Schedule Modal
		//list units of measurement
		$('#schedule').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getallschedules")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
					$('#txt').attr('placeholder','Schedules');
					$('#pdf').attr('placeholder','OpenICEA-Schedules');
					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newscheduleform')); ?>" id="addschedule">New Schedule</a></td></tr>';
					$('#itemheading').text("Schedules");
					var table = document.getElementById("itemcontents");
					var heads = ["Code", "Frequency", "Action" ];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}
					$("#items table tbody").append(actions);
					if(data.length>=1)
					{	
						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td  class='cell100 column1'>"+data[i].Code+"</td><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Frequency+"</td><td class='cell100 column3'><a href='<?php echo e(route("deleteschedule")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});


		$('#itemcontents').on('click', '#addschedule', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href+' #msform',function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Schedule');
				return;
			});
		});

		$('.modal-body').on('click', '#saveschedule', function() {
			var form = new FormData(document.getElementById('msform'));
			$.ajax({
				type: 'post',
				url: '<?php echo e(route("createschedule")); ?>',
				data: form,
				processData: false,
				contentType: false,
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getallschedules")); ?>',
						data: {},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Schedules');
							$('#pdf').attr('placeholder','OpenICEA-Schedules');
							if(data.length>=1)
							{	
								$('#itemheading').text("Schedules");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}
								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newscheduleform')); ?>" id="addschedule">New Schedule</a></td></tr>';
								$("#items table tbody").append(actions);

								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td  class='cell100 column1'>"+data[i].Code+"</td><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Frequency+"</td><td class='cell100 column3'><a href='<?php echo e(route("deleteschedule")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});					
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//Product Group Modal
		//list units of measurement
		$('#productgroup').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getallproductgroups")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
					$('#txt').attr('placeholder','Product Groups');
					$('#pdf').attr('placeholder','OpenICEA-Product Groups');
					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newproductgroupform')); ?>" id="addproductgroup">New Product Group</a></td></tr>';
					$('#itemheading').text("Product Groups");
					var table = document.getElementById("itemcontents");
					var heads = ["Name", "Action" ];
					generateTableHead(table, heads);
					var table = document.getElementById("itemcontents");
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}
					$("#items table tbody").append(actions);
					if(data.length>=1)
					{	
						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1' ><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deleteproductgroup")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});


		$('#itemcontents').on('click', '#addproductgroup', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href+' #msform',function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Producted Group');
				return;
			});
		});

		$('.modal-body').on('click', '#saveproductgroup', function() {
			var form = new FormData(document.getElementById('msform'));
			$.ajax({
				type: 'post',
				url: '<?php echo e(route("createproductgroup")); ?>',
				data: form,
				processData: false,
				contentType: false,
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getallproductgroups")); ?>',
						data: {},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Product Groups');
							$('#pdf').attr('placeholder','OpenICEA-Product Groups');
							if(data.length>=1)
							{	
								$('#itemheading').text("Product Groups");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}
								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newproductgroupform')); ?>" id="addproductgroup">New Product Group</a></td></tr>';
								$("#items table tbody").append(actions);

								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deleteproductgroup")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});					
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//Drug Modal
		//list units of measurement
		$('#drug').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getalldrugs")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
					$('#txt').attr('placeholder','Drugs');
					$('#pdf').attr('placeholder','OpenICEA-Drugs');

					console.log(data);
					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newdrugform')); ?>" id="adddrug">New Drug</a></td></tr>';
					$('#itemheading').text("Drugs");
					var table = document.getElementById("itemcontents");
					var heads = ["Drug Name", "Dose","Preparation", "Measurement", "ShortName", "Medicine Type", "For Sale?", "Unit_Price", "Action" ];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}
					$("#items table tbody").append(actions);
					if(data.length>=1)
					{	
						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].DrugName+"</td><td  class='cell100 column1'>"+data[i].Dose+"</td><td  class='cell100 column1'>"+data[i].Preparation+"</td><td  class='cell100 column1'>"+data[i].Measurement+"</td><td  class='cell100 column1'>"+data[i].ShortName+"</td><td  class='cell100 column1'>"+data[i].MediType+"</td><td  class='cell100 column1'>"+data[i].ForSale+"</td><td  class='cell100 column1'>"+data[i].UnitPrice+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletedrug")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);

						}

					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});


		$('#itemcontents').on('click', '#adddrug', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href+' #msform',function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Drug');
				return;
			});
		});

		$('.modal-body').on('click', '#savedrug', function() {
			var form = new FormData(document.getElementById('msform'));
			$.ajax({
				type: 'post',
				url: '<?php echo e(route("createdrug")); ?>',
				data: form,
				processData: false,
				contentType: false,
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getalldrugs")); ?>',
						data: {},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Drugs');
							$('#pdf').attr('placeholder','OpenICEA-Drugs');
							if(data.length>=1)
							{	
								$('#itemheading').text("Drugs");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}
								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newdrugform')); ?>" id="adddrug">New Drug</a></td></tr>';
								$("#items table tbody").append(actions);

								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].DrugName+"</td><td  class='cell100 column1'>"+data[i].Dose+"</td><td  class='cell100 column1'>"+data[i].Preparation+"</td><td  class='cell100 column1'>"+data[i].Measurement+"</td><td  class='cell100 column1'>"+data[i].ShortName+"</td><td  class='cell100 column1'>"+data[i].MediType+"</td><td  class='cell100 column1'>"+data[i].NavCode+"</td><td  class='cell100 column1'>"+data[i].ForSale+"</td><td  class='cell100 column1'>"+data[i].UnitPrice+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletedrug")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});					
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//Regimen Modal
		//list units of measurement
		$('#regimen').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getallregimens")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
					$('#txt').attr('placeholder','Regimens');
					$('#pdf').attr('placeholder','OpenICEA-Regimens');
					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newregimenform')); ?>" id="addregimen">New Regimen</a></td></tr>';
					$('#itemheading').text("Drugs");
					var table = document.getElementById("itemcontents");
					var heads = ["Code", "Type", "Action" ];
					generateTableHead(table, heads);

					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}
					$("#items table tbody").append(actions);
					if(data.length>=1)
					{	
						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Code+"</td><td  class='cell100 column1'>"+data[i].Type+"</td><td class='cell100 column3'><a href='<?php echo e(route("deleteregimen")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});


		$('#itemcontents').on('click', '#addregimen', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href+' #msform',function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Regimen');
				return;
			});
		});

		$('.modal-body').on('click', '#saveregimen', function() {
			var form = new FormData(document.getElementById('msform'));
			$.ajax({
				type: 'post',
				url: '<?php echo e(route("createregimen")); ?>',
				data: form,
				processData: false,
				contentType: false,
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getallregimens")); ?>',
						data: {},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Regimens');
							$('#pdf').attr('placeholder','OpenICEA-Regimens');
							if(data.length>=1)
							{	
								$('#itemheading').text("Drugs");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}
								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('newregimenform')); ?>" id="addregimen">New Regimen</a></td></tr>';
								$("#items table tbody").append(actions);

								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Code+"</td><td  class='cell100 column1'>"+data[i].Type+"</td><td class='cell100 column3'><a href='<?php echo e(route("deleteregimen")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});					
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//Lab Test Modal
		$('#labtest').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getalllabtests")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
					$('#txt').attr('placeholder','Lab Tests');
					$('#pdf').attr('placeholder','OpenICEA-Lab Tests');
					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('labtestform')); ?>" id="addlabtest">New Lab Test</a></td></tr>';
					$('#itemheading').text("Lab Tests");
					var table = document.getElementById("itemcontents");
					var heads = ["Name", "Type of Lab Test", "Sample", "Action"];
					generateTableHead(table, heads);
					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}
					$("#items table tbody").append(actions);
					if(data.length>=1)
					{	
						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].TestName+"</td><td  class='cell100 column1'>"+data[i].TypeOfLabTest+"</td><td  class='cell100 column1'>"+data[i].labsample.Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletelabtest")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});


		$('#itemcontents').on('click', '#addlabtest', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href+' #msform',function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Lab Test');
				return;
			});
		});

		$('.modal-body').on('click', '#savelabtest', function() {
			var form = new FormData(document.getElementById('msform'));
			$.ajax({
				type: 'post',
				url: '<?php echo e(route("createlabtest")); ?>',
				data: form,
				processData: false,
				contentType: false,
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.laberror').append(data.error[i]+' | ');
						}
						$(".laberror").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getalllabtests")); ?>',
						data: {},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Lab Tests');
							$('#pdf').attr('placeholder','OpenICEA-Lab Tests');
							if(data.length>=1)
							{	
								$('#itemheading').text("Lab Tests");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}
								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('labtestform')); ?>" id="addlabtest">New Lab Test</a></td></tr>';
								$("#items table tbody").append(actions);
								for (var i = 0; i < data.length; i++){
									var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].TestName+"</td><td  class='cell100 column1'>"+data[i].TypeOfLabTest+"</td><td  class='cell100 column1'>"+data[i].labsample.Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletelabtest")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
									$("#items table tbody").append(markup);
								}
							}
							$('.modal').each(function(){
								$(this).modal('hide');
								$(".error").css("display", "none");
								$('.error').text(""); 
							});					
						},
						error: function(){
							console.log('success');
						},
					});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//Sample Type Modal
		$('#sampletype').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getallsampletypes")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
					$('#txt').attr('placeholder','Samples');
					$('#pdf').attr('placeholder','OpenICEA-Samples');
					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('sampletypeform')); ?>" id="addsampletype">New Sample Type</a></td></tr>';
					$('#itemheading').text("Sample Types");
					var table = document.getElementById("itemcontents");
					var heads = ["Name", "Action"];
					generateTableHead(table, heads);


					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}
					// $("#items table").append(createHeader('["Name"]'));
					
					$("#items table tbody").append(actions);
					


					if(data.length>=1)
					{	
						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletesampletype")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});


		$('#itemcontents').on('click', '#addsampletype', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href+' #msform',function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('Add New Regimen');
				return;
			});
		});

		$('.modal-body').on('click', '#savesampletype', function() {
			var form = new FormData(document.getElementById('msform'));
			$.ajax({
				type: 'post',
				url: '<?php echo e(route("createsampletype")); ?>',
				data: form,
				processData: false,
				contentType: false,
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getallsampletypes")); ?>',
						data: {},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','Samples');
							$('#pdf').attr('placeholder','OpenICEA-Samples');
							if(data.length>=1)
							{	
								$('#itemheading').text("Sample Types");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}
								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('sampletypeform')); ?>" id="addsampletype">New Sample Type</a></td></tr>';
									// header =thead
									var heads = ["Name", "Action"];
									generateTableHead(table, heads);
									$("#items table tbody").append(actions);

									for (var i = 0; i < data.length; i++){
										var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Name+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletesampletype")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
										$("#items table tbody").append(markup);
									}
								}
								$('.modal').each(function(){
									$(this).modal('hide');
									$(".error").css("display", "none");
									$('.error').text(""); 
								});					
							},
							error: function(){
								console.log('success');
							},
						});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

	//DSDM Type Modal
		$('#dsdmtype').on('click', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '<?php echo e(route("getdsdmtypes")); ?>',
				data: {},
				success: function(data){
					$('#txt').val(JSON.stringify(data));
					$('#txt').attr('placeholder','DSDM Types');
					$('#pdf').attr('placeholder','OpenICEA-DSDM Types');
					var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('dsdmtypeform')); ?>" id="adddsdmtype">New DSDM Type</a></td></tr>';
					$('#itemheading').text("DSDM Types");
					var table = document.getElementById("itemcontents");
					var heads = ["Description", "Action"];
					generateTableHead(table, heads);


					for(var i = table.rows.length - 1; i > 0; i--)
					{
						table.deleteRow(i);
					}
					// $("#items table").append(createHeader('["Name"]'));
					
					$("#items table tbody").append(actions);
					


					if(data.length>=1)
					{	
						for (var i = 0; i < data.length; i++){
							var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Description+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletedsdmtypes")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
							$("#items table tbody").append(markup);
						}
					}
					else{
						$("#items table tbody").append(emptymarkup);
					}
					$('.modal').each(function(){
						$(this).modal('hide');
					});					
				},
				error: function(){
					console.log('success');
				},
			});

		});


		$('#itemcontents').on('click', '#adddsdmtype', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href+' #msform',function(){
				$('#mymodal').modal({show:true});
				$('.modal-title').text('New DSDM Type');
				return;
			});
		});

		$('.modal-body').on('click', '#savedsdmtype', function() {
			var form = new FormData(document.getElementById('msform'));
			$.ajax({
				type: 'post',
				url: '<?php echo e(route("savedsdmtype")); ?>',
				data: form,
				processData: false,
				contentType: false,
				success: function(data){
					if(data.error){
						$('.error').html('');
						for(var i=0;i<data.error.length;i++){
							$('.error').append(data.error[i]+' | ');
						}
						$(".error").css("display", "block");
						return;
					}
					$.ajax({
						type: 'get',
						url: '<?php echo e(route("getdsdmtypes")); ?>',
						data: {},
						success: function(data){
							$('#txt').val(JSON.stringify(data));
							$('#txt').attr('placeholder','DSDM Types');
							$('#pdf').attr('placeholder','OpenICEA-DSDM Types');
							if(data.length>=1)
							{	
								$('#itemheading').text("DSDM Types");
								var table = document.getElementById("itemcontents");
								for(var i = table.rows.length - 1; i > 0; i--)
								{
									table.deleteRow(i);
								}
								var actions = '<tr class="row100 body clickable-row"><td class="cell100 column1" colspan="10"><a href="<?php echo e(route('dsdmtypeform')); ?>" id="adddsdmtype">New DSDM Type</a></td></tr>';
					
									// header =thead
									var heads = ["Description", "Action"];
									generateTableHead(table, heads);
									$("#items table tbody").append(actions);

									for (var i = 0; i < data.length; i++){
										var markup = "<tr class='row100 body clickable-row'><td class='cell100 column1'><input type='hidden' name='itemid[]' value='" +data[i].OID+"'>"+data[i].Description+"</td><td class='cell100 column3'><a href='<?php echo e(route("deletedsdmtypes")); ?>' onclick='deleteitem(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 20px; float: left; margin: 5px 2px;' title='Delete Item'></a></td></tr>";
										$("#items table tbody").append(markup);
									}
								}
								$('.modal').each(function(){
									$(this).modal('hide');
									$(".error").css("display", "none");
									$('.error').text(""); 
								});					
							},
							error: function(){
								console.log('success');
							},
						});
				},
				error: function(){
					console.log('Error');
				},
			});
		});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('patient::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenICEA\modules/User\Resources/views/management/masterlist.blade.php ENDPATH**/ ?>