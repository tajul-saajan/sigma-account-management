<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:journal-list|journal-create|journal-edit|journal-delete', ['only' => ['index','show']]);
         $this->middleware('permission:journal-create', ['only' => ['create','store']]);
         $this->middleware('permission:journal-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:journal-delete', ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $journals = Journal::all();
        return response()->json($journals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $journal = Journal::make($request->all());

        $journal->inserted_by = auth()->user()->name;
        $journal->last_update_time = date_create();

        $statusCode = $this->updateChartOfAccount($journal);
        if ($statusCode===201) {
            $journal->save();
            return response()->json($journal,201);
        }

        return response()->json($journal,405);
    }

    /**
     * update COA for debit and credit accounts
     *
     * @param \App\Models\Journal $journal
     * @return int
     */
    private function updateChartOfAccount($journal)
    {
        $debitAccount = $journal->debitAccount;
        $creditAccount = $journal->creditAccount;

        $debitType = $debitAccount->accountSubType->accountType->type;
        $creditType = $creditAccount->accountSubType->accountType->type;

        $debitSign = null;
        $creditSign = null;

        dump($debitType,$creditType);

        if ($debitType === 'Expense' || $debitType === 'Asset') $debitSign = '+';
        else $debitSign = '-';

        if ($creditType === 'Equity' || $creditType === 'Liability' || $creditType === 'Revenue') $creditSign = '+';
        else $creditSign = '-';

        if ($debitSign === $creditSign) return 405;

        if ($debitSign === '+') {
            $debitAccount->balance += $journal->amount;
            $creditAccount->balance -= $journal->amount;
        } else {
            $creditAccount->balance += $journal->amount;
            $debitAccount->balance -= $journal->amount;
        }

        $debitAccount->update();
        $creditAccount->update();

        return 201;
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
        $data = $request->all();
        $data[Journal::FIELD_UPDATED_BY] = auth()->user()->name;
        $data[Journal::FIELD_LAST_UPDATE_TIME] = date_create('now',timezone_open("Asia/Dhaka"));

        $journal->update($data);
        $this->updateChartOfAccount($journal);
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

        return response()->json(null, 204);
    }
}
