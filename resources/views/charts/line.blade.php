@extends('cylinders::charts.index')

@section('content')

	<canvas id="myChart" width="400" height="200"></canvas>
	
@endsection

@section('chart')

	<script>
		var ctx = document.getElementById('myChart').getContext('2d');
		var chart = new Chart(ctx, {
		    // The type of chart we want to create
		    type: 'bar',
		
		    // The data for our dataset
		    data: {
		        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
		        datasets: [{
		            label: 'Data Set 1',
		            backgroundColor: 'rgb(255, 99, 132, 0.1)',
		            borderColor: 'rgb(255, 99, 132)',
		            data: [12, 5, 9, 12, 17, 20, 15],
    		        fill: false,
    		        type: 'line'
		        },
		        {
		            label: 'Data Set 2',
		            backgroundColor: 'rgb(128, 99, 132, 0.5)',
		            borderColor: 'rgb(128, 99, 132)',
		            data: [12, 5, 9, 12, 17, 20, 15],
    		        fill: false
		        }
		        ],

		    },
		
		    // Configuration options go here
		    options: {
			    
		    }
		});	
	</script>
	
@endsection
