<?php

namespace App\Http\Controllers;

use App\Service;
use App\Service_cat;
use App\ServiceLanding;
use Illuminate\Http\Request;

class ServiceLandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(123);
        $category = Service_cat::all();
        return view('service-landing', compact('category'));
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
     * @param  \App\ServiceLanding  $serviceLanding
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceLanding $serviceLanding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceLanding  $serviceLanding
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceLanding $serviceLanding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceLanding  $serviceLanding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceLanding $serviceLanding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceLanding  $serviceLanding
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceLanding $serviceLanding)
    {
        //
    }
}
