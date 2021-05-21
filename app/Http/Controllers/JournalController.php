<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return Journal::paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $journal = Journal::create($request->all());

        return response()->json($journal,201);
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Journal $journal
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $journal = Journal::find($id);
        return response()->json($journal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Journal $journal
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $journal = Journal::find($id);
        return $journal;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Journal $journal
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $journal = Journal::find($id);
        $journal->update($request->all());
        return response()->json($journal, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Journal $journal
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $journal = Journal::find($id);
        $journal->delete();

        return response()->json(null,204);
    }
}
