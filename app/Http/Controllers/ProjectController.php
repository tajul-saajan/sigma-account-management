<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return Project::paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $project = Project::create($request->all());

        return response()->json($project, 201);
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $project = Project::find($id);
        return response()->json($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return $project;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $project->update($request->all());
        return response()->json($project, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $project = Project::find($id);
        $project->delete();

        return response()->json(null, 204);
    }
}
