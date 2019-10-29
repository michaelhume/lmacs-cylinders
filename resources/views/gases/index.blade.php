@extends('cylinders::layout.master')


@section('content')

	<h3>Complete Gas List</h3>
	<div class="table">
		<table class="table table-striped">
			<thead>
				<th>Name</th>
				<th>Formula</th>
			</thead>
			<tbody>
				
				@foreach($gases as $gas)
				
					<tr>
						<td><a href="{{ $gas->path() }}">{{ $gas->name }}</a></td>
						<td><a href="{{ $gas->path() }}">{{ $gas->formula }}</a></td>
					</tr>
				
				@endforeach
			</tbody>
		</table>
	</div>

@endsection