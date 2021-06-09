<?php

namespace App\Http\Controllers;

use App\Models\PublicHoliday;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PublicHolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $holidays = PublicHoliday::latest()->get();
        return response()->json($holidays->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        PublicHoliday::create($request->all());

        return response()->json('Public Holiday Successfully added');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\PublicHoliday $holiday
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $holiday = PublicHoliday::find($id);
        return response()->json($holiday);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PublicHoliday $holiday
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $holiday = PublicHoliday::find($id);
        return response()->json($holiday);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PublicHoliday $holiday
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $holiday = PublicHoliday::find($id);
        $holiday->update($request->all());
        return response()->json('The Public Holiday successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PublicHoliday $holiday
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $holiday = PublicHoliday::find($id);
        $holiday->delete();

        return response()->json('The Public Holiday successfully deleted');
    }


    public function getNextHolidays(Request $request)
    {
        $from = $request->from;
        $to = $request->to;

        if (!$from) $from = Carbon::now('GMT+6');
        if (!$to) $to = (Carbon::now('GMT+6')->addDays(7));

        if (gettype($from) == 'string') $from = Carbon::createFromFormat('Y-m-d', $from);
        if (gettype($to) == 'string') $to = Carbon::createFromFormat('Y-m-d', $to);


        $data = PublicHoliday::whereBetween(PublicHoliday::FIELD_DATE, [$from->format('Y-m-d') . " 00:00:00",
            $to->format('Y-m-d') . " 23:59:59"])->get();
        return response()->json($data);
    }
}
