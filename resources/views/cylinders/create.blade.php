@extends('cylinders::layout.master')


@section('content')

	<h3>Create a new Cylinder</h3>
	
	<form method="post" action="{{ route('cylinders.store') }}">
		@csrf
		
		@include('cylinders::cylinders.form')
		
	</form>

@endsection