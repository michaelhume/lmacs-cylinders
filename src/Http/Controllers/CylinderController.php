<?php

namespace nanofab\cylinders\Http\Controllers;

use App\Http\Controllers\Controller;
use nanofab\cylinders\Models\Cylinder;
use nanofab\cylinders\Models\Gas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CylinderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$cylinders = Cylinder::cursor()->sortBy('name');
		return view('cylinders::cylinders.index', ['cylinders' => $cylinders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $gases = Gas::cursor()->sortBy('name');
        return view('cylinders::cylinders.create', ['gases' => $gases]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    
	    Cylinder::create($this->validateCylinder());
	    
	    return redirect(route('cylinders.index'));
	    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cylinder  $cylinder
     * @return \Illuminate\Http\Response
     */
    public function show(Cylinder $cylinder)
    {
        return view('cylinders::cylinders.show', ['cylinder' => $cylinder]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cylinder  $cylinder
     * @return \Illuminate\Http\Response
     */
    public function edit(Cylinder $cylinder)
    {
	    $gases = Gas::cursor()->sortBy('name');
        return view('cylinders::cylinders.edit', ['cylinder' => $cylinder, 'gases' => $gases]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cylinder  $cylinder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cylinder $cylinder)
    {
       
	    $cylinder->update($this->validateCylinder());
	    
	    return redirect($cylinder->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cylinder  $cylinder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cylinder $cylinder)
    {
        //
        $cylinder->delete();
        return redirect(route('cylinders.index'));
    }
    
    
    /**
     * validateCylinder function.
     * 
     * @access protected
     * @return array
     */
    protected function validateCylinder(){
	    
    	return request()->validate([
				'name' => ['required', 'min:3', 'max:180'],
				'gas_id' => ['required', 'numeric'],
				'volume' => ['required'],    
				'pressure' => ['required', 'numeric'],
				'partNumber' => '',
				'vendor' => '',
			]);	
    }
	
}
