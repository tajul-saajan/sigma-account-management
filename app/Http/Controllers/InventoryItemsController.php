<?php

namespace App\Http\Controllers;

use App\Models\InventoryItems;
use Illuminate\Http\Request;

class InventoryItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InventoryItems::paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $inventoryItems = InventoryItems::create($request->all());
        return response()->json($inventoryItems,201);
        // $item = Item::create($request->all());
        // return response()->json('Item Successfully added');
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
     * @param  \App\Models\InventoryItems  $inventoryItems
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryItems $inventoryItems)
    {
        $inventoryItems = InventoryItems::find($inventoryItems);
        return response()->json($inventoryItems);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventoryItems  $inventoryItems
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventoryItems = InventoryItems::find($id);
        return $inventoryItems;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InventoryItems  $inventoryItems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inventoryItems = InventoryItems::find($id);
        $inventoryItems->update($request->all());
        return response()->json($inventoryItems, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryItems  $inventoryItems
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $inventoryItems = InventoryItems::find($id);
        $inventoryItems->delete();

        return response()->json(null,204);
    }
}
