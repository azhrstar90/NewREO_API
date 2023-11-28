<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\RealEstateObject;


class RealEstateObjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating sample real estate objects
        for ($i = 0; $i < 250; $i++) {
            $types = ['Apartment', 'Home', 'Super Markit'];
            DB::table('objects')->insert([
                'ObjectID' => rand(10000, 999999), // Random bigint
                'ObjectName' => Str::random(10),   // Random string for object name
                'ObjectPrice' => rand(1, 1000),    // Random price
                'objectType' => $types[rand(0, 2)],   // Random string for object type
                'created_at' => now(),          // Current timestamp
                'updated_at' => now(),          // Current timestamp
            ]);        // Add more objects as needed
        }
    }
}
