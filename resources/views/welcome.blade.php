@extends('layout.main')
@section('content')
	<h1 class="text-center">{{ trans('rota.rota_slot_staff') }}</h1>
	<br>
	<table class="table table-bordered main-table table-responsive shift-times">
		<thead>
			<tr>
				<th>{{ trans('rota.day') }}</th>
				<th class="visible-xs">{{ trans('rota.staff_id') }}</th>
				<th class="hidden-xs">{{ trans('rota.staff_and_times') }}</th>
				<th>{{ trans('rota.total_hours_worked') }}</th>
			</tr>
		</thead>
		<tbody>
			@foreach($dayByStaff as $day => $staff)
				<tr>
					<th>
						{{ intToDayOfWeek($day) }}
					</th>
					<td class="wrapper">
						<table class="table inner-table">
							<tr>
								@foreach($staff as $member)
									<td>{{ $member['staffid'] }}
										<small class="hidden-xs">({{ $member['starttime'] }}
											- {{ $member['endtime'] }})
										</small>
									</td>
								@endforeach
							</tr>
						</table>
					</td>
					<td>
						{{ $hoursByDay[$day]['totalHoursWorked'] }}
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

	<div class="row">
		<h1 class="text-center">Staff work by day in minutes</h1>
		<br>
		<div id="rota-staff-by-day"></div>
	</div>
@endsection
@push('after-scripts')
	<script>
		$(document).ready(function() {
			$.get('{{ route('api.rota.staff.by.day') }}', function(rotaStaff) {
				$.each(rotaStaff, function(staffId, staff) {
					var data = [];

					appendStaffDivToWrapperDiv('#rota-staff-by-day', staffId);

					$.each(staff, function(key, value) {
						var workMinutes = floatHoursToMinutes(value.workhours);

						data.push({
							name : 'Day ' + value.daynumber,
							y    : workMinutes,
						});
					});

					createStaffPieChart(staffId, data);
				});
			});
		});
	</script>
@endpush