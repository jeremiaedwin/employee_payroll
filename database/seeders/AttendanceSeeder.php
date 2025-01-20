<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Attendance;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 50; $i++){
            $currentDate = date("Y-m-d");
            $presentTime = $this->generateRandomTime('07:30', '08:30');
            $leaveTime = $this->generateRandomTime('16:30', '17:00');

            // Convert strings to Carbon instances
            $present = Carbon::parse($presentTime);
            $leave = Carbon::parse($leaveTime);

            // Calculate the difference in hours
            $workingHours = $present->floatDiffInHours($leave);

            Attendance::create([
                "employee_id" => $i,
                "date" => $currentDate,
                "working_hours" => $workingHours,
                "status" => "leave",
                "created_at" => $presentTime,
                "updated_at" => $leaveTime
            ]);
        }
    }

    private function generateRandomTime($startTime, $endTime)
    {
        $start = Carbon::createFromFormat('H:i', $startTime);
        $end = Carbon::createFromFormat('H:i', $endTime);

        $randomTime = Carbon::createFromTimestamp(rand($start->timestamp, $end->timestamp));
        return $randomTime->format('Y-m-d H:i:s');
    }
}
