<?php

namespace App\Http\Controllers;

use App\Models\SubProject;
use Illuminate\Http\Request;

class SubProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $subProjects = SubProject::paginate(10);
        return response()->json($subProjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        SubProject::create($request->all());

        return response()->json('Sub Project Successfully added');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\SubProject $subProject
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $subProject = SubProject::find($id);
        return response()->json($subProject);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\SubProject $subProject
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $subProject = SubProject::find($id);
        return response()->json($subProject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SubProject $subProject
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $subProject = SubProject::find($id);
        $subProject->update($request->all());
        return response()->json('The Sub Project successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SubProject $subProject
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $subProject = SubProject::find($id);
        $subProject->delete();

        return  response()->json('The Sub Project successfully deleted');
    }
}
