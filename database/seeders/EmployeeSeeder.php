<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_EN');
 
        for($i = 1; $i <= 50; $i++){

            $firstName = $faker->firstName;
            $lastName = $faker->lastName;
            $fullName = $firstName . " " . $lastName;
            $email = $firstName.$lastName."@email.com";

            Employee::create([
                'name' => $fullName,
                'email' => $email,
                'phone' => $faker->tollFreePhoneNumber,
                'position_id' => rand(1, 15)
            ]); 
        }
    }
}
