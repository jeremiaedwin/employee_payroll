<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Overtime;
use App\Models\PositionSalary;
use App\Models\Employee;

class OvertimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 10; $i++){
            $currentDate = "2025-01-21";
            $presentTime = $this->generateRandomTime('17:30', '18:00', $currentDate);
            $leaveTime = $this->generateRandomTime('18:30', '21:00', $currentDate);

            $present = Carbon::parse($presentTime);
            $leave = Carbon::parse($leaveTime);

            $workingHours = $present->floatDiffInHours($leave);

            $id = rand(1, 50);
            $employee = Employee::find($id);
            $workingSalary = PositionSalary::where('position_id', '=', $employee->position_id)->first();

            $ratePerHour = $workingSalary->amount;

            $total = ($ratePerHour * $workingHours) / 2;

            Overtime::create([
                "employee_id" => $id,
                "date" => $currentDate,
                "hours" => $workingHours,
                "rate_per_hour" => $ratePerHour,
                "total" => $total,
                "created_at" => $presentTime,
                "updated_at" => $leaveTime
            ]);

            
        }
    }

    private function generateRandomTime($startTime, $endTime, $date)
    {
        $start = Carbon::createFromFormat('Y-m-d H:i', "$date $startTime");
        $end = Carbon::createFromFormat('Y-m-d H:i', "$date $endTime");

        $randomTime = Carbon::createFromTimestamp(rand($start->timestamp, $end->timestamp));
        return $randomTime->format('Y-m-d H:i:s');
    }
    
}
