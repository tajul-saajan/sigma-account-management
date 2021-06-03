<?php

namespace App\Http\Controllers;

use App\Models\ApplyForLeave;
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
        $applications = ApplyForLeave::all();
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

        $application->applied_by = auth()->user()->name;
        $application->applied_at = date_create('now',timezone_open("Asia/Dhaka"));

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

    public function leaveTypes()
    {
        return DB::table('leave_types')->get();
    }
}
