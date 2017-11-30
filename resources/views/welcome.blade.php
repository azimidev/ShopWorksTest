@extends('layouts.app')
@section('content')
	<div class="container">
		@include('partials._shifts')
		@include('partials._total')
		@include('partials._alone')
	</div>
@endsection