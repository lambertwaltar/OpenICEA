@extends('patient::layouts.master')

@section('title') OpenICEA | Client Management @endsection

@section('links')

@endsection


@section('heading')
	<font class="page-heading">TRIBES</font>
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
								<th class="cell100 column1">Name</th>
								<th></th>
							</tr>
						</thead>
					</table>
				</div>

				<div class="table100-body js-pscroll">
					<table>
						<tbody>
                      		@foreach ($tribes as $tribe)
								<tr class="row100 body clickable-row">
									<td class="cell100 column1">{{ $tribe->Name }}</td>
									<td class="cell100 column5"><a href="{{ route('deletetribe', ['id' => Crypt::encrypt($tribe->OID)]) }}" ><img src="images/delete.png" style="width:20px; margin: 0 5px;"></a></td>
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


        
  