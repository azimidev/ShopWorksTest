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