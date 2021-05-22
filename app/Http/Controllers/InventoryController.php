<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return Inventory::paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $inventory = Inventory::create($request->all());

        return response()->json($inventory,201);
    }


    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $inventory = Inventory::find($id);
        return response()->json($inventory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $inventory = Inventory::find($id);
        return $inventory;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param \App\Models\Inventory $inventory
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $inventory = Inventory::find($id);
        $inventory->update($request->all());
        return response()->json($inventory, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();

        return response()->json(null,204);
    }

    /**
     * Get the items in the inventories.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function inventoryItems($id)
    {
        return Inventory::find($id)->inventoryItems;
    }
}
