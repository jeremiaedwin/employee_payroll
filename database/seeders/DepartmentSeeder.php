<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            'Tech Support',
            'Information Technology Management',
            'IT Security',
            'Project Management',
            'Networking',
            'IT Management',
            'Software Developer',
            'Human Resource',
        ];

        foreach ($departments as $name) {
            Department::create(['name' => $name]);
        }
    }
}
