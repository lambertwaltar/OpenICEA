@extends('patient::layouts.master')

@section('title') OpenICEA | Client Management @endsection

@section('links')

@endsection


@section('heading')
	<font class="page-heading">CLIENT LIST</font>
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
								<th class="cell100 column1">Client Number</th>
								<th class="cell100 column2">Registration Date</th>
								<th class="cell100 column2">FirstName</th>
								<th class="cell100 column2">Surname</th>
								<th class="cell100 column3">Initial</th>
								<th class="cell100 column3">Gender</th>
								<th class="cell100 column3">Country</th>
								<th class="cell100 column3">Marital Status</th>
								<th class="cell100 column5">Follow-up status</th>
							</tr>
						</thead>
					</table>
				</div>

				<div class="table100-body js-pscroll">
					<table>
						<tbody>
                      		@foreach ($clients as $client)
								<tr class="row100 body clickable-row">
									<td class="cell100 column1">{{ $client->IDCNO }}</td>
									<td class="cell100 column2">{{ $client->RegistrationDate }}</td>
									<td class="cell100 column2">{{ $client->FirstName }}</td>
									<td class="cell100 column2">{{ $client->Surname }}</td>
									<td class="cell100 column3">{{ $client->Initial }}</td>
									<td class="cell100 column3">{{ $client->Gender }}</td>
									<td class="cell100 column3">@if($client->Country){{ $client->countryy->Name }} @endif</td>
									<td class="cell100 column3">{{ $client->MaritalStatus }}</td>
									<td class="cell100 column5">{{ $client->FollowUpStatus }}</td>
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


        
  