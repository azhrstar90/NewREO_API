<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientsRequests;
use App\Http\Resources\ClientsResource;
use Illuminate\Http\Request;
use App\Models\Clients;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ClientsResource::collection(Clients::orderBy('ClientsID', 'asc')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientsRequests $request)
    {
        $valdiated = $request->validated();
        $Client = Clients::create($valdiated);
        return new ClientsResource($Client);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ObjectsTrans = Clients::with('transactions')->findOrFail($id);
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
