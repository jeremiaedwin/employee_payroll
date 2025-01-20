<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PositionAllowance;

class PositionAllowanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positionAllowance = [
            ["position_id" => 1, "allowance_type_id" => 1, "amount" => rand ( 5 , 10 )],
            ["position_id" => 1, "allowance_type_id" => 2, "amount" => rand ( 5 , 10 )],
            ["position_id" => 1, "allowance_type_id" => 3, "amount" => rand ( 5 , 10 )],

            ["position_id" => 2, "allowance_type_id" => 1, "amount" => rand ( 5 , 10 )],
            ["position_id" => 2, "allowance_type_id" => 2, "amount" => rand ( 5 , 10 )],
            ["position_id" => 2, "allowance_type_id" => 3, "amount" => rand ( 5 , 10 )],

            ["position_id" => 3, "allowance_type_id" => 1, "amount" => rand ( 5 , 10 )],
            ["position_id" => 3, "allowance_type_id" => 2, "amount" => rand ( 5 , 10 )],
            ["position_id" => 3, "allowance_type_id" => 3, "amount" => rand ( 5 , 10 )],

            ["position_id" => 4, "allowance_type_id" => 1, "amount" => rand ( 5 , 10 )],
            ["position_id" => 4, "allowance_type_id" => 2, "amount" => rand ( 5 , 10 )],
            ["position_id" => 4, "allowance_type_id" => 3, "amount" => rand ( 5 , 10 )],

            ["position_id" => 5, "allowance_type_id" => 1, "amount" => rand ( 5 , 10 )],
            ["position_id" => 5, "allowance_type_id" => 2, "amount" => rand ( 5 , 10 )],
            ["position_id" => 5, "allowance_type_id" => 3, "amount" => rand ( 5 , 10 )],

            ["position_id" => 6, "allowance_type_id" => 1, "amount" => rand ( 5 , 10 )],
            ["position_id" => 6, "allowance_type_id" => 2, "amount" => rand ( 5 , 10 )],
            ["position_id" => 6, "allowance_type_id" => 3, "amount" => rand ( 5 , 10 )],

            ["position_id" => 7, "allowance_type_id" => 1, "amount" => rand ( 5 , 10 )],
            ["position_id" => 7, "allowance_type_id" => 2, "amount" => rand ( 5 , 10 )],
            ["position_id" => 7, "allowance_type_id" => 3, "amount" => rand ( 5 , 10 )],

            ["position_id" => 8, "allowance_type_id" => 1, "amount" => rand ( 5 , 10 )],
            ["position_id" => 8, "allowance_type_id" => 2, "amount" => rand ( 5 , 10 )],
            ["position_id" => 8, "allowance_type_id" => 3, "amount" => rand ( 5 , 10 )],

            ["position_id" => 9, "allowance_type_id" => 1, "amount" => rand ( 5 , 10 )],
            ["position_id" => 9, "allowance_type_id" => 2, "amount" => rand ( 5 , 10 )],
            ["position_id" => 9, "allowance_type_id" => 3, "amount" => rand ( 5 , 10 )],

            ["position_id" => 10, "allowance_type_id" => 1, "amount" => rand ( 5 , 10 )],
            ["position_id" => 10, "allowance_type_id" => 2, "amount" => rand ( 5 , 10 )],
            ["position_id" => 10, "allowance_type_id" => 3, "amount" => rand ( 5 , 10 )],

            ["position_id" => 11, "allowance_type_id" => 1, "amount" => rand ( 5 , 10 )],
            ["position_id" => 11, "allowance_type_id" => 2, "amount" => rand ( 5 , 10 )],
            ["position_id" => 11, "allowance_type_id" => 3, "amount" => rand ( 5 , 10 )],

            ["position_id" => 12, "allowance_type_id" => 1, "amount" => rand ( 5 , 10 )],
            ["position_id" => 12, "allowance_type_id" => 2, "amount" => rand ( 5 , 10 )],
            ["position_id" => 12, "allowance_type_id" => 3, "amount" => rand ( 5 , 10 )],

            ["position_id" => 13, "allowance_type_id" => 1, "amount" => rand ( 5 , 10 )],
            ["position_id" => 13, "allowance_type_id" => 2, "amount" => rand ( 5 , 10 )],
            ["position_id" => 13, "allowance_type_id" => 3, "amount" => rand ( 5 , 10 )],

            ["position_id" => 14, "allowance_type_id" => 1, "amount" => rand ( 5 , 10 )],
            ["position_id" => 14, "allowance_type_id" => 2, "amount" => rand ( 5 , 10 )],
            ["position_id" => 14, "allowance_type_id" => 3, "amount" => rand ( 5 , 10 )],

            ["position_id" => 15, "allowance_type_id" => 1, "amount" => rand ( 5 , 10 )],
            ["position_id" => 15, "allowance_type_id" => 2, "amount" => rand ( 5 , 10 )],
            ["position_id" => 15, "allowance_type_id" => 3, "amount" => rand ( 5 , 10 )],
        ];

        foreach ($positionAllowance as $allowance) {
            PositionAllowance::create([
                'position_id' => $allowance['position_id'],
                'allowance_type_id' => $allowance['allowance_type_id'],
                'amount' => $allowance['amount']
            ]);
        }
    }
}
