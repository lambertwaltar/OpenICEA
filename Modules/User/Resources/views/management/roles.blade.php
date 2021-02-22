@extends('user::layouts.master')

@section('title') OpenICEA | Admin @endsection

@section('links')	
	<style>
		select:required:invalid {
	      color: #666;
	      }
	      option[value=""][disabled] {
	      display: none;
	      }
	      option {
	      color: #000;
	      }
		select{

	    font-family: montserrat !important;
	    font-size: 13px !important;
	   /*  height: calc(1.5em + .75rem + 5px) !important; */
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
		.mb-4, .my-4 {
	     margin-bottom: 0.5rem!important; 
		}
		.table100-body td {
	    padding-top: 0 !important;
	    padding-bottom: 0 !important;
		}

		.column1 {
	    width: 12%;
	    padding-left: 0px;
		}

		.modal-footer {
			border-top: none;
		}
		.table100.ver1 td {
	    line-height: 3 !important;
		}

	</style>
@endsection

@section('heading')
	<!--<img src="images/user.png" style="width:4%;"> --><font class="page-heading">ROLE MANAGEMENT</font>
@endsection


@section('content')
	<div class="limiter">

		<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
		    <div class="container-fluid">
		        <ul class="nav navbar-nav flex-nowrap ml-auto" id="menu-container">
		            <div class="d-none d-sm-block topbar-divider"></div>
		            <li role="presentation" class="nav-item" >
		              <a class="nav-link" href="{{url('new_role')}}" id="addrole">
		                <img src="images/add.png" style="width:20px;" /> <p style="font-size:0.7em;">New Role</p>
		              </a>
		            </li>

		            <li role="presentation" class="nav-item" >
		              <a class="nav-link" href="{{url('newpermission')}}" id="addpermission">
		                <img src="images/add.png" style="width:20px;" /> <p style="font-size:0.7em;">New Permission</p>
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
									<th class="cell100 column1">Role name</th>
									<th class="cell100 column1">Permissions</th>
									<th class="cell100 column3"></th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
	                      		@foreach ($roles as $role)
									<tr class="row100 body clickable-row">
										<td class="cell100 column1">{{$role->name}}</td>
										<td class="cell100 column1">
											@php ($permissions = [])
											@foreach($role->permissions as $perm){{$perm->name}} | 
												@php ($permissions[] = $perm->name)
											 @endforeach</td>
										<td class="cell100 column3">
											<a class="editrole" href="{{ route('new_role', ['name'=>$role->name, 'perms'=>$permissions, 'id' => Crypt::encrypt($role->id)]) }}" id="editrole"><img src="images/edit.png" style="width:15px; margin: 0 5px;"></a>
											<a href='{{route("deleterole", ["id" => Crypt::encrypt($role->id)])}}' onclick='deleteitems(this); return false;' style='cursor: pointer';><img src='images/remove.png' style='width: 15px;  margin: 5px 2px;' title='Delete Item'></a>
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
	<script type="text/javascript"> // Modal JS
		//Permission Modal
			$('#addpermission').on('click', function(e) {
				e.preventDefault();
				var href = $(this).attr("href");
				$('#partial').load(href+' #msform',function(){
			        $('#mymodal').modal({show:true});
			        $('.modal-title').text('Add New Permissions');
			        return false;
			    });
			});

			$('.modal-body').on('click', '#savepermission', function() {
			  var name = $("input[name='permissionname']").val();	
			  $.ajax({
			            type: 'get',
			            url: '{{route("createpermission")}}',
			            data: {'permissionname':name},
			            success: function(){
		                    $('#mymodal').modal('hide');
			            },
			            error: function(){
			                console.log('Error');
			            },
			        });
			});

		//Role Modal
			$('#addrole').on('click', function(e) {
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
			  $.ajax({
			            type: 'get',
			            url: '{{route("createrole")}}',
			            data: {'rolename':name, 'permissions':permissions.toString()},
			            success: function(){
		                    $('#mymodal').modal('hide');
		                    window.location = "{{ route('roles') }}";
			            },
			            error: function(){
			                console.log('Error');
			            },
			        });
			});
			
		//Edit Role Modal
			$('.editrole').on('click', function(e) {
				e.preventDefault();
				var href = $(this).attr("href");
				var url = new URL(href);
				var id = url.searchParams.get("id");
				var name = url.searchParams.get("name");
				var route = href.split('?')[0];

				$('#partial').load(route,function(){
			        $('#mymodal').modal({show:true});
			        $('.modal-title').text('Edit Role');
			        $("input[name='rolename']").val(name);
			        $("input[name='id']").val(id);
			        $(".submit").attr("id","saveedit");
			        $(".submit").text("Edit Role");
			        return false;
			    });
			});

			$('.modal-body').on('click', '#saveedit', function() {
			  var name = $("input[name='rolename']").val();
			  var id = $("input[name='id']").val();
			  var permissions = $("select[name='duallistbox_demo1[]']").val();
			  $.ajax({
			            type: 'get',
			            url: '{{route("editrole")}}',
			            data: {'rolename':name, 'permissions':permissions.toString(),'id':id},
			            success: function(){
		                    $('#mymodal').modal('hide');
		                    //location.reload(true);
		                    window.location = "{{ route('roles') }}";
		                    return false;
			            },
			            error: function(){
			                console.log('Error');
			                return false;
			            },
			        });
			});

		//autofocus for modal
			$('#mymodal').on('shown.bs.modal', function() {	
			  	$(this).find('[autofocus]').focus();
			});

		//delete items
	        function deleteitems(r)
	        {       
	                confirm("Are you sure you want to delete?");
	                r.parentNode.parentNode.remove();
	                var href = r.getAttribute("href");
	                var url = new URL(href);
	                var id = url.searchParams.get("id");

	                $.ajax({
	                    type: 'get',
	                    url: href,
	                    data:{'id':id},
	                    success: function(data)
	                    {                                           
	                        
	                    }

	                });
	        }
	</script>
		
	

@endsection
        
  