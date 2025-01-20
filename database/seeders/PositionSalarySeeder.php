<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PositionSalary;

class PositionSalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positionSalaries = [
            ["position_id" => 1, "amount" => 25],
            ["position_id" => 2, "amount" => 30],
            ["position_id" => 3, "amount" => 35],
            ["position_id" => 4, "amount" => 32],
            ["position_id" => 5, "amount" => 40],
            ["position_id" => 6, "amount" => 45],
            ["position_id" => 7, "amount" => 60],
            ["position_id" => 8, "amount" => 35],
            ["position_id" => 9, "amount" => 35],
            ["position_id" => 10, "amount" => 35],
            ["position_id" => 11, "amount" => 45],
            ["position_id" => 12, "amount" => 35],
            ["position_id" => 13, "amount" => 45],
            ["position_id" => 14, "amount" => 25],
            ["position_id" => 15, "amount" => 30],
        ];

        foreach ($positionSalaries as $salaries) {
            PositionSalary::create([
                'position_id' => $salaries['position_id'],
                'amount' => $salaries['amount']
            ]);
        }
    }
}
