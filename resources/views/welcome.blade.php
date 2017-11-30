@extends('layouts.app')
@section('content')
	<div class="container">
		<h1 class="page-header">Staff Slot Rota</h1>
		<table class="table table-bordered table-responsive">
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
		</table>
		<h1 class="page-header">Total Hours Worked This week</h1>
		<table class="table table-bordered table-responsive">
			<tr>
				@foreach ($total as $key => $value)
					<th>
						{{ $key }} Total Hours: <span class="badge">{{ $value['hours'] }}</span>
					</th>
				@endforeach
			</tr>
		</table>
	</div>
@endsection