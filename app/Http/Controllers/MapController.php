<?php

namespace App\Http\Controllers;

use App\Http\Resources\MapResource;
use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maps = Map::all();
        $maps = MapResource::collection($maps);
        return response()->json(['status' =>'success', 'maps' => $maps],202);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $maps = Map::store($request);

        return response()->json(['status' =>'success', 'maps' => $maps],202);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $maps = Map::find($id);

        return response()->json(['status' =>'success', 'maps' => $maps],202);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
