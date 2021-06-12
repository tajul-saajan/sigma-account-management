<?php

namespace App\Http\Controllers;

use App\Models\ApplyForLeave;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplyForLeaveController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:leave-list|leave-create|leave-edit|leave-delete', ['only' => ['index','show']]);
         $this->middleware('permission:leave-create', ['only' => ['create','store']]);
         $this->middleware('permission:leave-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:leave-delete', ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $applications = ApplyForLeave::latest()->get();
        return  response()->json($applications->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $application = ApplyForLeave::make($request->all());

        $application[ApplyForLeave::FIELD_APPLIED_BY] = auth()->user()->name;
        $application[ApplyForLeave::FIELD_USER_ID] = auth()->user()->id;
        $application[ApplyForLeave::FIELD_APPLIED_AT] = date_create('now',timezone_open("Asia/Dhaka"));

        $application->save();

        return response()->json($application, 201);
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\ApplyForLeave $application
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $application = ApplyForLeave::find($id);
        return response()->json($application);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ApplyForLeave $application
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $application = ApplyForLeave::find($id);
        return $application;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ApplyForLeave $application
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $application = ApplyForLeave::find($id);

        $application->applied_by = auth()->user()->name;
        $application->applied_at = date_create('now',timezone_open("Asia/Dhaka"));

        $application->save($request->all());
        return response()->json($application, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ApplyForLeave $application
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $application = ApplyForLeave::find($id);
        $application->delete();

        return response()->json(null, 204);
    }

    public function approve($id)
    {
        $application = ApplyForLeave::find($id);
        $application[ApplyForLeave::FIELD_APPROVED] = "Approved";
        $application[ApplyForLeave::FIELD_ENDORSED] = "Approved";
        $application[ApplyForLeave::FIELD_ENDORSED_BY] = auth()->user()->name;
        $application[ApplyForLeave::FIELD_APPROVED_BY] = auth()->user()->name;
        $application->save();


    }

    public function reject($id)
    {
        $application = ApplyForLeave::find($id);
        $application[ApplyForLeave::FIELD_APPROVED] = "Rejected";
        $application[ApplyForLeave::FIELD_APPROVED_BY] = auth()->user()->name;
        $application->save();
    }

    public function leaveTypes()
    {
        return DB::table('leave_types')->get();
    }

    public function getNextLeaves(Request $request)
    {
        $from = $request->from;
        $to = $request->to;

        if (!$from) $from = Carbon::now('GMT+6');
        if (!$from && !$to) $to = (Carbon::now('GMT+6')->addDays(7));

        if (gettype($from) == 'string') $from = Carbon::createFromFormat('Y-m-d', $from);
        if (gettype($to) == 'string') $to = Carbon::createFromFormat('Y-m-d', $to);


        $data = ApplyForLeave::whereBetween(ApplyForLeave::FIELD_FROM_DATE, [$from->format('Y-m-d') . " 00:00:00",
            $to->format('Y-m-d') . " 23:59:59"])->where(ApplyForLeave::FIELD_APPROVED,'Approved')->get();
        return response()->json($data);
    }
}
