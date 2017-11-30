<h1 class="page-header">Total Hours Worked Alone This week</h1>
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
			<td class="text-center text-middle">
				Alone Minutes:
				<span class="badge">{{ $alone['monday'] }}</span>
			</td>
			<td class="text-center text-middle">
				Alone Minutes:
				<span class="badge">{{ $alone['tuesday'] }}</span>
			</td>
			<td class="text-center text-middle">
				Alone Minutes:
				<span class="badge">{{ $alone['wednesday'] }}</span>
			</td>
			<td class="text-center text-middle">
				Alone Minutes:
				<span class="badge">{{ $alone['thursday'] }}</span>
			</td>
			<td class="text-center text-middle">
				Alone Minutes:
				<span class="badge">{{ $alone['friday'] }}</span>
			</td>
			<td class="text-center text-middle">
				Alone Minutes:
				<span class="badge">{{ $alone['saturday'] }}</span>
			</td>
			<td class="text-center text-middle">
				Alone Minutes:
				<span class="badge">{{ $alone['sunday'] }}
			</td>
		</tr>
	</tbody>
</table>