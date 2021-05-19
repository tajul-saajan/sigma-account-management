<?php

namespace App\Http\Controllers;

use App\Models\AccountSubType;
use Illuminate\Http\Request;

class AccountSubTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $accountSubTypes = AccountSubType::paginate(10);
        return response()->json($accountSubTypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        AccountSubType::create($request->all());

        return response()->json('Account Sub Type Successfully added');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\AccountSubType $accountSubType
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $accountSubType = AccountSubType::find($id);
        return response()->json($accountSubType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\AccountSubType $accountSubType
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $accountSubType = AccountSubType::find($id);
        return response()->json($accountSubType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AccountSubType $accountSubType
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $accountSubType = AccountSubType::find($id);
        $accountSubType->update($request->all());
        return response()->json('The Account Sub Type successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\AccountSubType $accountSubType
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $accountSubType = AccountSubType::find($id);
        $accountSubType->delete();

        return  response()->json('The Account Sub Type successfully deleted');
    }
}
