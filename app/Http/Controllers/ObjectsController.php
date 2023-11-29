<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ObjectsResource;
use App\Models\Objects;


class ObjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ObjectsResource::collection(Objects::orderBy('ObjectID', 'asc')->get());
    }

    /**
     * Filter for objects depend on th Type Min price and Max price.
     */
    public function Object_filter(Request $request)
    {
        $filters = $request->only(['type', 'min_price', 'max_price']);
        $objectsDatas = Objects::filter($filters)
            ->orderBy('ObjectPrice', 'asc')
            ->get();
        return ($objectsDatas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Retrieve a specific object with all transactions associated with it
     */
    public function show(string $id)
    {
        $ObjectsTrans = Objects::with('transactions')->findOrFail($id);
        return ($ObjectsTrans);
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
