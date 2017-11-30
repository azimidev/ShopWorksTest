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
				<td>Total Hours: <span class="badge">{{ $value['hours'] }}</span></td>
			@endforeach
		</tr>
	</tbody>
</table>