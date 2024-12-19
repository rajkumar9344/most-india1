<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BloodGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Predefined blood group values
        $bloodGroups = [
            ['name' => 'A+'],
            ['name' => 'A-'],
            ['name' => 'B+'],
            ['name' => 'B-'],
            ['name' => 'O+'],
            ['name' => 'O-'],
            ['name' => 'AB+'],
            ['name' => 'AB-'],
        ];

        DB::table('blood_groups')->insert($bloodGroups);
        //
    }
}
