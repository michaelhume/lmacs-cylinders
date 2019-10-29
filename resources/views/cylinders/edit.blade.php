@extends('cylinders::layout.master')


@section('content')

	<h3>Edit {{ $cylinder->name }}</h3>
	
	<form class="" method="post" action="{{ route('cylinders.update', $cylinder) }}">
		@csrf
		
		@method('put')
		
		@include('cylinders::cylinders.form')
		
	</form>
	
	<form class="" method="post" action="{{ route('cylinders.destroy', $cylinder) }}">
		@csrf
		
		@method('delete')
		
		<div class="form-group">
			<button type="submit" class="btn btn-danger">Delete</button>
		</div>
		
	</form>

@endsection