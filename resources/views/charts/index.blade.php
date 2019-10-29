@extends('cylinders::layout.master')

@section('head')

	<link rel="stylesheet" href="/css/Chart.css" />

@endsection


@section('content')

	<a href="{{ route('charts.show', 'bar') }}" class="btn btn-outline-primary">Bar Chart</a>
	<a href="{{ route('charts.show', 'line') }}" class="btn btn-outline-primary">Line Chart</a>

@endsection


@section('scripts')
	
	<script src="/js/moment.min.js"></script>
	<script src="/js/Chart.js"></script>
	
	@yield('chart')
	

@endsection

