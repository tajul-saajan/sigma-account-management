<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requisition;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Requisition::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $requisitionJson = $this->preProcessRequest($request);
        $requisition = new Requisition($requisitionJson);
        $requisition->save();

        return response()->json($requisition, 201);
    }

    private function preProcessRequest($request){
        $requisitionJson = json_decode($request->requisition,true);
        if ($request->file('attachment')){
            $fileName = time() . '.' . $request->file('attachment')->getClientOriginalExtension();
            $request->file('attachment')->storeAs('requisition_attachments/', $fileName);
            $requisitionJson['attachment_path'] = $fileName;
        }
        return $requisitionJson;
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Requisition $requisition
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $requisition = Requisition::find($id);
        return response()->json($requisition);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Requisition $requisition
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $requisition = Requisition::find($id);
        return $requisition;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Requisition $requisition
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $requisition = Requisition::find($id);
        if ($requisition->attachment_path && $request->file('attachment')){
            unlink(storage_path('app/requisition_attachments/'.$requisition->attachment_path));
        }
        $requisitionJson = $this->preProcessRequest($request);
        $requisition->update($requisitionJson);
        return response()->json($requisition, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Requisition $requisition
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $requisition = Requisition::find($id);
        if ($requisition->attachment_path){
            unlink(storage_path('app/requisition_attachments/'.$requisition->attachment_path));
        }
        $requisition->delete();

        return response()->json(null, 204);
    }
}
