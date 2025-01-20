<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            DepartmentSeeder::class,
            AllowanceTypeSeeder::class,
            PositionSeeder::class,
            PositionSalarySeeder::class,
            PositionAllowanceSeeder::class,
            EmployeeSeeder::class.
            AttendanceSeeder::class,
            OvertimeSeeder::class
        ]);
    }
}
