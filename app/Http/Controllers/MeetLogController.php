<?php

namespace App\Http\Controllers;

use App\Models\MeetLog;
use App\Http\Requests\StoreMeetLogRequest;
use App\Http\Requests\UpdateMeetLogRequest;

class MeetLogController extends Controller
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
     * @param  \App\Http\Requests\StoreMeetLogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMeetLogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MeetLog  $meetLog
     * @return \Illuminate\Http\Response
     */
    public function show(MeetLog $meetLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MeetLog  $meetLog
     * @return \Illuminate\Http\Response
     */
    public function edit(MeetLog $meetLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMeetLogRequest  $request
     * @param  \App\Models\MeetLog  $meetLog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMeetLogRequest $request, MeetLog $meetLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MeetLog  $meetLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeetLog $meetLog)
    {
        //
    }
}
