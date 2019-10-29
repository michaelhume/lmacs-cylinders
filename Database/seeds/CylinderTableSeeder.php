<?php

use Illuminate\Database\Seeder;
use nanofab\cylinders\Models\Cylinder;

class CylinderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    factory(Cylinder::class, 10)->create();
       	
    }
}
