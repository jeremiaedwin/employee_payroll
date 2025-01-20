<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            ['department_id'=> 1, 'name'=>'Help Desk Technician'],
            ['department_id'=> 1, 'name'=>'Technical Support Specialist'],
            ['department_id'=> 1, 'name'=>'Information Technology Manager'],
            ['department_id'=> 2, 'name'=>'IT Support Analysis'],
            ['department_id'=> 3, 'name'=>'Network security engineer'],
            ['department_id'=> 3, 'name'=>'Network security specialist'],
            ['department_id'=> 4, 'name'=>'Project Manager'],
            ['department_id'=> 5, 'name'=>'Network Support'],
            ['department_id'=> 6, 'name'=>'Techlead'],
            ['department_id'=> 7, 'name'=>'Junior Backend Engineer'],
            ['department_id'=> 7, 'name'=>'Senior Backend Engineer'],
            ['department_id'=> 7, 'name'=>'Senior Fronted Engineer'],
            ['department_id'=> 7, 'name'=>'Senior Fronted Engineer'],
            ['department_id'=> 8, 'name'=>'HR generalist'],
            ['department_id'=> 8, 'name'=>'HR manager']
        ];

        foreach ($positions as $position) {
            Position::create([
                'department_id' => $position['department_id'],
                'name' => $position['name']
            ]);
        }
    }
}
