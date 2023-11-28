<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\clients;



class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 250; $i++) {
            DB::table('clients')->insert([
                'ClientsID' => rand(10000, 999999),
                'ClientName' => Str::random(10),
                'ClientType' => rand(0, 1) ? 'Individual' : 'LegalEntity',
                'ClientContact' => Str::random(10) . '@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
