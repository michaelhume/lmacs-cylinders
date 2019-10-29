<?php

namespace nanofab\cylinders\Http\Controllers;

use App\Http\Controllers\Controller;
use nanofab\cylinders\Models\Gas;
use nanofab\cylinders\Models\Cylinder;
use Illuminate\Http\Request;

class GasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gases = Gas::cursor()->sortBy('name');

        return view('cylinders::gases.index', compact('gases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gas  $gas
     * @return \Illuminate\Http\Response
     */
    public function show(Gas $gas)
    {
        return view('cylinders::gases.show', ['gas' => $gas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gas  $gas
     * @return \Illuminate\Http\Response
     */
    public function edit(Gas $gas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gas  $gas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gas $gas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gas  $gas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gas $gas)
    {
        //
    }
}
