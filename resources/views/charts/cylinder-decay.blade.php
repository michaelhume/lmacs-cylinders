@extends('cylinders::charts.index')

@section('content')
  
	<canvas id="myChart" width="400" height="200"></canvas>
	
	<div class="card">
		<div class="card-header">
			{{ $dataLabel }}
		</div>
		<div class="card-body">
			<p class="card-text">
				<table class="table">
					<tbody>
						<tr>
							<th scope="row">Time Until Empty</th>
							<td>{{ $dateDiff }}</td>
						</tr>
						<tr>
							<th scope="row">Approximate Date</th>
							<td>{{ $endDate }}</td>
						</tr>
						<tr>
							<th scope="row">Initial Volume (ATM)</th>
							<td>{{ $initialVolume }}</td>
						</tr>
						<tr>
							<th scope="row">Daily Consumption Rate</th>
							<td>{{ $dailyFlow }}</td>
						</tr>
					</tbody>
				</table>
			</p>
			<div class="alert alert-warning" role="alert">
				<p>We're assuming <strong>{{ $hours }}</strong> hours per day at <strong>{{ $sccm }} cm<sup>3</sup>/min</strong> 5 days a week - <em>we assume people take weekends off</em>. This is most certainly going to be a bit off since this is all based on average daily usage. To be safe, let's make sure there is a new cylinder on hand by <strong>{{ Carbon\Carbon::create($endDate)->sub('1 month')->format('M jS, Y') }}</strong>.</p>
			</div>
			<div class="clearfix">
				<a href="{{ route('cylinders.show', $cylinder ) }}" class="btn btn-outline-primary float-right">Back to {{ $cylinder->name }}</a>
				<a href="{{ route('cylinders.index') }}" class="btn btn-outline-primary float-left">All Cylinders</a>
		</div>
	</div>
	&nbsp;
	
@endsection

@section('chart')

	<script>
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
		    type: '{{ $type }}',
		    labels: {!! $labels !!},
		    // The data for our dataset
		    data: {
		        datasets: [{
		            label: '{{ $dataLabel }}',
		            backgroundColor: 'rgb(255, 99, 132)',
		            borderColor: 'rgb(255, 99, 132)',
		            data: {!! $data !!},
		            fill: false
		        }]
		    },
		
		    // Configuration options go here
		    options: {
		        scales: {
		            xAxes: [{
		                type: 'time',
		                scaleLabel:{
			                display: true,
			            	labelString: '{{ $xAxisLabel }}'
			            }
		            }],
		            yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: '{{ $yAxisLabel }}'
						}
					}]
		        }
		    }	
		    
		});
	</script>
	
@endsection


