<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('states')->insert([
            ['name' => 'Andhra Pradesh'],
            ['name' => 'Arunachal Pradesh'],
            ['name' => 'Assam'],
            ['name' => 'Bihar'],
            ['name' => 'Chhattisgarh'],
            ['name' => 'Goa'],
            ['name' => 'Gujarat'],
            ['name' => 'Haryana'],
            ['name' => 'Himachal Pradesh'],
            ['name' => 'Jharkhand'],
            ['name' => 'Karnataka'],
            ['name' => 'Kerala'],
            ['name' => 'Madhya Pradesh'],
            ['name' => 'Maharashtra'],
            ['name' => 'Manipur'],
            ['name' => 'Meghalaya'],
            ['name' => 'Mizoram'],
            ['name' => 'Nagaland'],
            ['name' => 'Odisha'],
            ['name' => 'Punjab'],
            ['name' => 'Rajasthan'],
            ['name' => 'Sikkim'],
            ['name' => 'Tamil Nadu'],
            ['name' => 'Telangana'],
            ['name' => 'Tripura'],
            ['name' => 'Uttar Pradesh'],
            ['name' => 'Uttarakhand'],
            ['name' => 'West Bengal'],
            ['name' => 'Andaman and Nicobar Islands'],
            ['name' => 'Chandigarh'],
            ['name' => 'Dadra and Nagar Haveli and Daman and Diu'],
            ['name' => 'Lakshadweep'],
            ['name' => 'Delhi'],
            ['name' => 'Puducherry'],
        ]);

        //
    }
}
