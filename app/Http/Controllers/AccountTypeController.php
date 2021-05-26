<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use Illuminate\Http\Request;

class AccountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $accounts = AccountType::all();
        return response()->json($accounts->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        AccountType::create($request->all());

        return response()->json('Account Type Successfully added');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\AccountType $accountType
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $accountType = AccountType::find($id);
        return response()->json($accountType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\AccountType $accountType
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $accountType = AccountType::find($id);
        return response()->json($accountType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AccountType $accountType
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $accountType = AccountType::find($id);
        $accountType->update($request->all());
        return response()->json('The Account Type successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\AccountType $accountType
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $accountType = AccountType::find($id);
        $accountType->delete();

        return  response()->json('The Account Type successfully deleted');
    }
}
