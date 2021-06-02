<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:transaction-list|transaction-create|transaction-edit|transaction-delete', ['only' => ['index','show']]);
         $this->middleware('permission:transaction-create', ['only' => ['create','store']]);
         $this->middleware('permission:transaction-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:transaction-delete', ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $transactions = Transaction::all();
        return response()->json($transactions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $transactionJson = json_decode($request->transaction, true);
        $transaction = (collect($transactionJson))->get('transaction');
        if ($request->file('check_image')) {
            $fileName = time() . '.' . $request->file('check_image')->getClientOriginalExtension();
            $request->file('check_image')->storeAs('cheque_images/', $fileName);
            $transaction['cheque_image_path'] = $fileName;
        }
        if ($request->file('invoice_file')) {
            $fileName = time() . '.' . $request->file('invoice_file')->getClientOriginalExtension();
            $request->file('invoice_file')->storeAs('invoice_files/', $fileName);
            $transaction['invoice_path'] = $fileName;
        }


        $t = new Transaction($transaction);
        $t->save();
        return response()->json($t, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Transaction $transaction
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);
        return response()->json($transaction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Transaction $transaction
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $transaction = Transaction::find($id);
        return $transaction;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $transaction->update($request->all());
        return response()->json($transaction, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Transaction $transaction
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();

        return response()->json(null, 204);
    }
}
