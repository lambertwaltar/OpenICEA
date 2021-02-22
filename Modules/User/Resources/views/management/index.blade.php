@extends('user::layouts.master')

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

		#msform fieldset {
	    width: 100%;
	    margin: 0;
		}

		#msform input, #msform textarea {
		padding: 7px;
		}
	</style>
@endsection

@section('heading')
	<!--<img src="images/user.png" style="width:4%;"> --><font class="page-heading">SYSTEM USERS</font>
@endsection

@section('content')
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
	                      		@foreach ($users as $user)
									<tr class="row100 body clickable-row">
										<td class="cell100 column1">{{ $user->username }}</td>
										<td class="cell100 column2">{{ $user->FirstName.' '. $user->LastName }}</td>
										<td class="cell100 column3" align="center">
											@if($user->IsApproved =="1")
												<input type="checkbox" checked readonly>
											@else
												<input type="checkbox" readonly>
											@endif
										</td>
										<!-- <td class="cell100 column4">{{ $user->Clinician}}</td> -->
										<td class="cell100 column4">  @foreach($user->roles as $role) <div style="float:left; margin-right:3px;">{{ $role->name}},</div> @endforeach</td>
										<td class="cell100 column5">{{ $user->EmailAddress }}</td>
										<td class="cell100 column5">{{ $user->LastloginDate }}</td>
										<td class="cell100 column3">
											<a href="{{ route('edituser', ['id' => Crypt::encrypt($user->OID)]) }}" id="edituser"><img src="images/edituser.png" style="width:20px; margin: 0 5px;" title="Edit User"></a>
											@if($user->IsApproved =="0")
												<a  href="{{url('approveuser'.'/'.$user->OID)}}" ><img src="images/approve.png" style="width:20px; margin: 0 5px;" title="Approve User Account"></a>
											@endif

											
											@if(auth()->user()->OID == $user->OID)
											@else
												@if($user->IsLockedOut =="1")
													<a href="{{ route('unlockaccount', ['id' => Crypt::encrypt($user->OID)]) }}"><img src="images/unlock.png" style="width:20px; margin: 0 5px;" title="UnLock User Account"></a>
												@else
													<a href="{{ route('lockaccount', ['id' => Crypt::encrypt($user->OID)]) }}"><img src="images/lock.png" style="width:20px; margin: 0 5px;" title="Lock User Account"></a>
												@endif
											@endif
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


        
  