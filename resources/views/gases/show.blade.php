{{-- Blade component to render Gas Model --}}

@extends('cylinders::layout.master')

@section('content')
	
	<h3>{{ $gas->name }}</h3>
	
	<div class="table">
		<table class="table">
			<thead>
				<th>Name</th>
				<th>Formula</th>
				<th>Atomic Mass</th>
				<th>Appearance</th>
				<th>Summary</th>
			</thead>
			<tbody>
				<tr>
					<td>{{ $gas->name }}</td>
					<td>{{ $gas->formula }}</td>
					<td>{{ $gas->atomic_mass }}</td>
					<td>{{ $gas->appearance }}</td>
					<td>{{ $gas->summary }}</td>
				</tr>
			</tbody>
		</table>
	</div>
	
	@if( count( $gas->cylinders) ) 
		<div class="table">
			<table class="table">
				<thead>
					<th>Associated Cylinders</th>
				</thead>
				<tbody>
					@foreach( $gas->cylinders as $cylinder )
					
						<tr><td><a href="{{ $cylinder->path() }}">{{ $cylinder->name }}</a></td></tr>
					
					@endforeach		
				</tbody>
			</table>
		</div>
	@else
		<div class="alert alert-warning" role="alert">There are no associated cylinders for this gas</div>
	@endif

@endsection