<?php

namespace App\Http\Controllers;

use App\Models\InventoryItems;
use Illuminate\Http\Request;

class InventoryItemsController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:inventory-item-list|inventory-item-create|inventory-item-edit|inventory-item-delete', ['only' => ['index','show']]);
         $this->middleware('permission:inventory-item-create', ['only' => ['create','store']]);
         $this->middleware('permission:inventory-item-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:inventory-item-delete', ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(InventoryItems::all()->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $inventoryItem = InventoryItems::create($request->all());
        return response()->json($inventoryItem,201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(InventoryItems $inventoryItem)
    {
        $inventoryItem = InventoryItems::find($inventoryItem);
        return response()->json($inventoryItem);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventoryItem = InventoryItems::find($id);
        return $inventoryItem;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $inventoryItem = InventoryItems::find($id);
        $inventoryItem->update($request->all());
        return response()->json($inventoryItem, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $inventoryItem = InventoryItems::find($id);
        $inventoryItem->delete();

        return response()->json(null,204);
    }

    /**
     * get the relevant inventory the item belong to
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function inventory($id)
    {
        return InventoryItems::find($id)->inventory;
    }
}
