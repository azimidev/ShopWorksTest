@extends('layouts.app')
@section('content')
	<div class="container">
		<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<th>Days</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($days as $key => $value)
					<tr>
						<th>{{ $key }}</th>
						@foreach ($value as $day)
							<td>
								<span class="badge">STAFF {{ $day->staffid }}</span> <br>
								<span class="label label-success">{{ $day->starttime }}</span>
								<span class="label label-danger">{{ $day->endtime }}</span>
							</td>
						@endforeach
					</tr>
				@endforeach
			</tbody>
		</table>
		<table class="table table-bordered table-responsive">
			<tr>
				@foreach ($total as $key => $value)
					<th>
						{{ $key }} Total Hours: {{ $value['hours'] }}
					</th>
				@endforeach
			</tr>
		</table>
	</div>
@endsection