<?php

namespace App\Http\Controllers;

use App\Models\AccountSubType;
use Illuminate\Http\Request;

class AccountSubTypeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:account-subtype-list|account-subtype-create|account-subtype-edit|account-subtype-delete', ['only' => ['index','show']]);
         $this->middleware('permission:account-subtype-create', ['only' => ['create','store']]);
         $this->middleware('permission:account-subtype-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:account-subtype-delete', ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $accountSubTypes = AccountSubType::all();
        return response()->json($accountSubTypes->toArray());
    }

    public function getAll() {
        return AccountSubType::all();
    }

    public function getAccountType($id){
        $accountSubType = AccountSubType::find($id);
        return $accountSubType?$accountSubType->accountType:response()->json(null,404);
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
