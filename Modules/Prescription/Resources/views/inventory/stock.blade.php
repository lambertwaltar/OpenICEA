@extends('patient::layouts.master')

@section('title') OpenICEA | Admin @endsection

@section('links')
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

		#msform input, #msform textarea {
		padding: 7px;
		}

		th{
			/*width:auto !important;*/
		}

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

	</style>
@endsection

@section('heading')
	<!--<img src="images/user.png" style="width:4%;"> --><font class="page-heading">Stock Items</font>
@endsection

@section('content')
	<div class="limiter">
		<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
		    <div class="container-fluid">
		        <ul class="nav navbar-nav flex-nowrap ml-auto" id="menu-container">
		            <div class="d-none d-sm-block topbar-divider"></div>
		            <li role="presentation" class="nav-item" >
		              <a class="nav-link" href="{{url('newitemform')}}" id="additem">
		                <img src="images/addstock.png" style="width:30px;" /> <p style="font-size:0.7em;">New Item</p>
		              </a>
		            </li>
		        </ul>
		    </div>
		</nav>
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Item Name</th>
									<th class="cell100 column2">Funding Source</th>
									<th class="cell100 column3" style="width:13%">Unit of Description</th>
									<th class="cell100 column4">Drug</th>
									<th class="cell100 column3">QPU</th>
									<th class="cell100 column5">Location</th>
									<th class="cell100 column3">Active</th>
									<th class="cell100 column2"></th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
								@foreach ($stockitems as $stockitem)
								<tr class="row100 body clickable-row">
									<td class="cell100 column1">{{$stockitem->Description}}</td>
									<td class="cell100 column2">{{$stockitem->_fundingsource->Name}}</td>
									<td class="cell100 column3" style="width:13%">{{$stockitem->_unitdescription->Name}}</td>
									<td class="cell100 column4">{{$stockitem->_drug->DrugName}}</td>
									<td class="cell100 column3">{{$stockitem->QPU}}</td>
									<td class="cell100 column5">{{$stockitem->_location->Name}}</td>
									<td class="cell100 column3" align="center">
											@if($stockitem->Active =="1")
												<input type="checkbox" checked readonly>
											@else
												<input type="checkbox" readonly>
											@endif
									</td>
									<td  class="cell100 column2">
										<a href="{{ route('editstockitem', ['id' => Crypt::encrypt($stockitem->OID)]) }}" id="editstockitem"><img src="images/edit.png" style="width:20px; margin: 0 5px;" title="Edit Item"></a>

										<a href="{{ route('deletestockitem', ['id' => Crypt::encrypt($stockitem->OID)]) }}" id="deletestockitem"><img src="images/remove.png" style="width:20px; margin: 0 5px;" title="Edit Item"></a>


									</td>
								</tr>
								@endforeach			
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection

@section('footer-links')
	<script type="text/javascript" src="{{url('js/registration.js')}}"></script>
	<script type="text/javascript">
	$('#additem').on('click', function(e) {
			e.preventDefault();
			var href = $(this).attr("href");
			$('#partial').load(href,function(){
		        $('#mymodal').modal({show:true});
		        $('.modal-title').text('New Item');
		        //$('#mymodal .modal-dialog').addClass("modal-lg");
		        return;
		    });
		});

</script>
@endsection



        
  