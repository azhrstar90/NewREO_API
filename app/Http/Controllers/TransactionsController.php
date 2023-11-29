<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionsRequest;
use App\Http\Resources\TransactionsResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Clients;
use App\Models\Objects;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TransactionsResource::collection(Transaction::orderBy('TransID', 'asc')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionsRequest $request)
    {
        $validated = $request->validated();
        $transaction = Transaction::create($validated);


        $object = Objects::latest()->first(); // Getting the last Object
        $client = Clients::latest()->first(); // Getting the last Client

        //  Eloquent relationships if defined
        $transaction->trans_with_Objects()->attach($object->id, ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        $transaction->trans_with_clients()->attach($client->id, ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        return new TransactionsResource($transaction);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $transactionId)
    {
        $trans = Transaction::with(['trans_with_Objects', 'trans_with_clients'])->findOrFail($transactionId);
        return ($trans);
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
