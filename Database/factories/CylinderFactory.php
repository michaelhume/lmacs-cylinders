<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use nanofab\cylinders\Models\Gas;
use Faker\Generator as Faker;
use Carbon\Carbon;


$factory->define(nanofab\cylinders\Models\Cylinder::class, function (Faker $faker) {
	
	$gas = Gas::cursor()->random();
	
    return [
       	'name' => $gas->name . ' - Depot ' . $faker->numberBetween($min = 1, $max = 5),
	    'volume' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
	    'pressure' => $faker->numberBetween($min = 200, $max = 3000),
	    'vendor' => $faker->company,
	    'partNumber' => $faker->isbn13,
	    'gas_id' => $gas->id,
	    'created_at' => Carbon::now(),
	    'updated_at' => Carbon::now(),
    ];
});
