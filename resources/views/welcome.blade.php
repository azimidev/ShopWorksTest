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
			<thead>
				<tr>
					@foreach ($total as $key => $value)
						<th>{{ $key }}</th>
					@endforeach
				</tr>
			</thead>
			<tbody>
				<tr>
					@foreach ($total as $key => $value)
						<td>
							Total Hours: <span class="badge">{{ $value['hours'] }}</span>
						</td>
					@endforeach
				</tr>
			</tbody>
		</table>
		<h1 class="page-header">Total Hours Worked Alone This week</h1>
		<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<th>Monday</th>
					<th>Tuesday</th>
					<th>Wednesday</th>
					<th>Thursday</th>
					<th>Friday</th>
					<th>Saturday</th>
					<th>Sunday</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="text-center text-middle">
						Alone Minutes:
						<span class="badge">{{ $week['monday'] }}</span>
					</td>
					<td class="text-center text-middle">
						Alone Minutes:
						<span class="badge">{{ $week['tuesday'] }}</span>
					</td>
					<td class="text-center text-middle">
						Alone Minutes:
						<span class="badge">{{ $week['wednesday'] }}</span>
					</td>
					<td class="text-center text-middle">
						Alone Minutes:
						<span class="badge">{{ $week['thursday'] }}</span>
					</td>
					<td class="text-center text-middle">
						Alone Minutes:
						<span class="badge">{{ $week['friday'] }}</span>
					</td>
					<td class="text-center text-middle">
						Alone Minutes:
						<span class="badge">{{ $week['saturday'] }}</span>
					</td>
					<td class="text-center text-middle">
						Alone Minutes:
						<span class="badge">{{ $week['sunday'] }}
					</td>
				</tr>
			</tbody>
		</table>
	</div>
@endsection