<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 150; $i++) {
            $transactionId = DB::table('transactions')->insertGetId([
                'TransID' => rand(10000, 999999),
                'TransType' => rand(0, 1) ? 'completed' : 'rejected',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Fetch a random Real Estate Object's ID
            $realEstateObject = DB::table('objects')->inRandomOrder()->first();
            $realEstateObjectId = $realEstateObject ? $realEstateObject->ObjectID : null;

            // Fetch a random Client's ID
            $client = DB::table('clients')->inRandomOrder()->first();
            $clientId = $client ? $client->ClientsID : null;

            // Check if IDs are available before linking
            if ($realEstateObjectId && $clientId) {
                // Linking transaction to a real estate object
                DB::table('objects__transactions')->insert([
                    'ObjectTR_ID'   => $realEstateObjectId,
                    'TransOB_ID'    => $transactionId,
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now(),
                ]);

                // Linking transaction to a client
                DB::table('clients__transactions')->insert([
                    'ClientTR_ID'    => $clientId,
                    'TransCL_ID'     => $transactionId,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                ]);
            } else {
                // Handle cases where no real estate object or client is found
                Log::warning('TransactionSeeder: No real estate object or client found to link.');
            }
        }
    }
}
