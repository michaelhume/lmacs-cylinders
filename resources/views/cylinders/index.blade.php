@extends('cylinders::layout.master')


@section('content')

	<h3>Cylinders
		<a href="{{ route('cylinders.create') }}" class="btn btn-outline-primary btn-sm" role="button">Add New</a>
	</h3>
		
	<div class="table">
		<table class="table table-striped">
			<thead>
				<th>Name</th>
				<th>Gas</th>
			</thead>
			<tbody>
				@foreach($cylinders as $cylinder)
				
					<tr>
						<td><a href="{{ $cylinder->path() }}">{{ $cylinder->name }}</a></td>
						<td><a href="{{ $cylinder->gas->path() }}">{{ $cylinder->gas->name }}</a></td>
					</tr>
				
				@endforeach	
			</tbody>
		</table>
	</div>
		
	</ul>				

@endsection