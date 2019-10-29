@extends('cylinders::layout.master')


@section('content')

	<h3>{{ $cylinder->name }}</h3>
	
	<div class="table-responsive">
		<table class="table">
			<thead>
				<th>Name</th>
				<th>Gas</th>
				<th>Cylinder Volume (l)</th>
				<th>Pressure (psi)</th>
				<th>Part</th>
			</thead>
			<tbody>
				<tr>
					<td>{{ $cylinder->name }}</td>
					<td><a href="{{ $cylinder->gas->path() }}">{{ $cylinder->gas->name }}</a></td>
					<td>{{ $cylinder->volume }}</td>
					<td>{{ $cylinder->pressure }}</td>
					<td>{{ $cylinder->partNumber }}</td>
				</tr>
			</tbody>
		</table>
	</div>
	
	<span class=""><a href="{{ $cylinder->path() }}/edit" class="btn btn-outline-primary" role="button">Edit</a></span>

	<hr/>	
	<h4>Chart Estimated Cylinder Life</h3>
	
	<form method="post" action="{{ route('charts.create', $cylinder) }}">
		
		@csrf
		
		<div class="form-group">
		    <label for="currentPressure">Current Cylinder Pressure (psi)</label>
		    <input type="number" name="currentPressure" class="form-control @error('currentPressure') border border-danger @enderror"  aria-describedby="currentPressureHelp" placeholder="Enter Current Pressure"  value="{{ old('currentPressure') ?? $cylinder->pressure ?? '' }}" required="required">
		    <small id="currentPressureHelp" class="form-text text-muted">Update the current cylinder pressure</small>
		    @error('currentPressure')
				<div class="alert alert-danger" role="alert">{{ $errors->first('currentPressure') }}</div>
			@enderror
		</div>
		
		<div class="form-group">
		    <label for="flow">Total Flow (sccm)</label>
		    <input type="number" name="flow" class="form-control @error('flow') border border-danger @enderror" step="0.01" aria-describedby="flowHelp" placeholder="Enter flow"  value="{{ old('flow') }}" required="required ">
		    <small id="currentPressureHelp" class="form-text text-muted">Enter the average expected flow in sccm (cm<sup>3</sup>/min)</small>
		    @error('flow')
				<div class="alert alert-danger" role="alert">{{ $errors->first('flow') }}</div>
			@enderror
		</div>
		
		<div class="form-group">
		    <label for="hours">Estimated Hours Per Day (Average)</label>
		    <input type="number" name="hours" class="form-control @error('hours') border border-danger @enderror" step="0.01" aria-describedby="hoursHelp" placeholder="Enter hours"  value="{{ old('hours') }}">
		    <small id="hoursHelp" class="form-text text-muted">Provide an approximate expected number of hours per day at the given flow</small>
		    @error('hours')
				<div class="alert alert-danger" role="alert">{{ $errors->first('hours') }}</div>
			@enderror
		</div>
		
		
		<div class="form-group">
			<button type="submit" class="btn btn-outline-success">Chart</button>
		</div>
	</form>
	
	
@endsection