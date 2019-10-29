<?php

namespace nanofab\cylinders\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use nanofab\cylinders\Models\Cylinder;
use Carbon\Carbon;

class ChartController extends Controller
{
	
	/**
	 * index function.
	 * 
	 * @access public
	 * @return void
	 */
	public function index(){
	
		return view('cylinders::charts.index');	
	
	}

	/**
	 * show function.
	 * 
	 * @access protected
	 * @param mixed $type
	 * @return void
	 */
	public function show( $style ){
		
		if ( $style == 'custom' ){
			
			//y=a(1-b)x
			$start = 2500;
			$factor = 0.5;

			for ( $i = 1; $i < 50; $i++ ){
				
				$list[] = $start*(1-$factor)**$i;
				$points[] = $i;
			}	

			$data = '[' . implode($list, ',') . ']';
			
			$labels = '['. implode($points, ','). ']';
			$type = 'line';
			
			return view('cylinders::charts.' . $style, ['data' => $data, 'labels' => $labels, 'type' => $type ] );			

		}else{
			
			return view('cylinders::charts.' . $style);
		}
	}
	
	
	/**
	 * create function.
	 * 
	 * @access public
	 * @param Cylinder $cylinder
	 * @return void
	 */
	public function create( Request $request, Cylinder $cylinder ){
		
		$validated = $request->validate([
			'flow' => ['required', 'numeric'],
			'currentPressure' => ['required', 'numeric'],
			'hours' => ['required']
		]);
		
		$atm = 14.7;
		
		// volume in liters
		$vol = ( $validated['currentPressure'] ) * $cylinder->volume / $atm;
	
		// calculate the total volume used per day (l / day)
		// flow(cm^3 / min) * hours (60 / min)

		$dailyFlow = ($validated['flow'] / 1000) * ($validated['hours'] * 60);
		$vol = round( $vol, 2);
		$initialVolume = $vol . ' liters';
		
		$data = array();
		$points = array();
		$date = Carbon::now();

		// determine how fast this will be consumed at $flow in (sccm) = 1000 sccm = 1 l/min		
		// each iteration is 1 day
		while( $vol > 0 ){
			
			$list[] = '{ x: \'' . $date->addDay()->format('M j, Y') . '\', y: ' . $vol . '}';
			if ( $date->isWeekend() ){
				continue;
			}
			//$points[] = "'". $date->addDay()->format('Y-m-d') ."'";
			$vol = $vol - $dailyFlow;
		}
	
		$data = '[' . implode($list, ', ') . ']';
		$labels = '['. implode($points, ', '). ']';
		$dataLabel = $cylinder->name . ' Expected Depletion Rate';
		$yAxisLabel = 'Atmospheric Gas Volume (l)';
		$xAxisLabel = 'Date';
		
		$endDate = $date->format('M j, Y');
		$dateDiff = $date->diffForHumans();
		$dailyFlow = $dailyFlow . ' liters';
		
		
		return view('cylinders::charts.cylinder-decay', [	
			'data' => $data,
			'type' => 'line', 
			'dataLabel' => $dataLabel , 
			'labels' => $labels, 
			'cylinder' => $cylinder,
			'hours' => $validated['hours'],
			'sccm' => $validated['flow'],
			'yAxisLabel' => $yAxisLabel,
			'xAxisLabel' => $xAxisLabel,
			'dailyFlow' => $dailyFlow,
			'initialVolume' => $initialVolume,
			'endDate' => $endDate,
			'dateDiff' => $dateDiff,
		]);
	}
}
