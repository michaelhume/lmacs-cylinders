<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * 
     * periodid table provided by https://github.com/Bowserinator/Periodic-Table-JSON
     */
    public function run()
    {
	    $gases = Storage::disk('public')->get('PeriodicTable.json');
	    $gases = json_decode($gases, true);
	    $gases = array_pop($gases);
	    
	    foreach ( $gases as $gas ){
		    
	        DB::table('nf_gas')->insert([
	            'name' => $gas['name'],
	            'appearance' => $gas['appearance'],
	            'formula' => $gas['symbol'],
	            'phase' => $gas['phase'],
	            'atomic_mass' => $gas['atomic_mass'],
	            'summary' => $gas['summary'],
	            'created_at' => Carbon::now(),
	            'updated_at' => Carbon::now(),
	        ]);
	    }
    }
}