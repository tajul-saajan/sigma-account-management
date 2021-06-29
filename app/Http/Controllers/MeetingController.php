<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MeetingController extends Controller
{
    public function index()
    {
        return response()->json(Meeting::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
//        dd($request->meeting, $request->userIds);
        $meeting =  Meeting::create($request->meeting);
        $meeting->users()->sync($request->userIds);

        return response()->json('Meeting Successfully added');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Meeting $meeting
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $meeting = Meeting::find($id);
        return response()->json($meeting);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Meeting $meeting
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $meeting = Meeting::find($id);
        $userIds = DB::table('meeting_user')->where('meeting_id',$id)->pluck('user_id')->toArray();
        $allUsers = User::all();
        $meetingUsers = User::whereIn('id',$userIds)->get();
        return response()->json([$meeting, $meetingUsers, $allUsers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Meeting $meeting
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $meeting = Meeting::find($id);
        $meeting->update($request->meeting);
        $meeting->users()->sync($request->userIds);
        return response()->json('The Meeting successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Meeting $meeting
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $meeting = Meeting::find($id);
        $meeting->users()->detach();
        $meeting->delete();

        return  response()->json('The Meeting successfully deleted');
    }
}
