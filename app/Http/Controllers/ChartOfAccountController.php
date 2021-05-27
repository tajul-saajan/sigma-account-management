<?php

namespace App\Http\Controllers;

use App\Models\ChartOfAccount;
use Illuminate\Http\Request;

class ChartOfAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(ChartOfAccount::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $coa = ChartOfAccount::create($request->all());

        return response()->json($coa, 201);
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\ChartOfAccount $coa
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $coa = ChartOfAccount::find($id);
        return response()->json($coa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ChartOfAccount $coa
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $coa = ChartOfAccount::find($id);
        return $coa;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ChartOfAccount $coa
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $coa = ChartOfAccount::find($id);
        $coa->update($request->all());
        return response()->json($coa, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ChartOfAccount $coa
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $coa = ChartOfAccount::find($id);
        $coa->delete();

        return response()->json(null, 204);
    }

    public function getAccountType($id)
    {
        return ChartOfAccount::find($id)->accountSubType->accountType;
    }


    public function getDebitAccounts()
    {
        $coas = ChartOfAccount::all();
        $coas = $coas->filter(function ($item) {
            return $item->accountSubType->accountType->type !== 'Revenue';
        });

        return response()->json($coas->flatten());
    }

    public function getCreditAccounts()
    {
        $coas = ChartOfAccount::all();
        $coas = $coas->filter(function ($item) {
            return $item->accountSubType->accountType->type !== 'Expense';
        });

        return response()->json($coas->flatten());
    }

    public function allCashInCashCR()
    {
        $coas = ChartOfAccount::where(ChartOfAccount::FIELD_CASH_IN_CASH_CREDIT, 1)->get();
        return response()->json($coas);
    }

    public function allCashOutCashDB()
    {
        $coas = ChartOfAccount::where(ChartOfAccount::FIELD_CASH_OUT_CASH_DEBIT, 1)->get();
        return response()->json($coas);
    }

    public function allCashInChequeCR()
    {
        $coas = ChartOfAccount::where(ChartOfAccount::FIELD_CASH_IN_CHEQUE_CREDIT, 1)->get();
        return response()->json($coas);
    }

    public function allCashOutChequeDB()
    {
        $coas = ChartOfAccount::where(ChartOfAccount::FIELD_CASH_OUT_CHEQUE_DEBIT, 1)->get();
        return response()->json($coas);
    }

    public function allBanks()
    {
        $coas = ChartOfAccount::where(ChartOfAccount::FIELD_GL_NAME, 'like', '%Bank%')
            ->orWhere(ChartOfAccount::FIELD_GL_NAME, 'like', '%bank%')
            ->orWhere(ChartOfAccount::FIELD_GL_NAME, 'like', '%BANK%')->get();
        return response()->json($coas);
    }

}
