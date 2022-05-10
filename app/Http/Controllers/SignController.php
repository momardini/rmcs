<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use App\Http\Requests\StoreSignRequest;
use App\Http\Requests\UpdateSignRequest;

class SignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreSignRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSignRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sign  $sign
     * @return \Illuminate\Http\Response
     */
    public function show(Sign $sign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sign  $sign
     * @return \Illuminate\Http\Response
     */
    public function edit(Sign $sign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSignRequest  $request
     * @param  \App\Models\Sign  $sign
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSignRequest $request, Sign $sign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sign  $sign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sign $sign)
    {
        //
    }
}
