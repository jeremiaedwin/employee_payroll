<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AllowanceType;

class AllowanceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allowanceTypes = array(
            array (
                "name" => "Transportation",
                "description" => 'Allowance for employee transportation'
            ),
            array (
                "name" => "Family",
                "description" => 'Allowance for employee familly'
            ),
            array (
                "name" => "Education",
                "description" => 'Allowance for employee education'
            ),
        );

        foreach ($allowanceTypes as $allowance) {
            AllowanceType::create([
                'name' => $allowance['name'],
                'description' => $allowance['description']
            ]);
        }
    }
}
