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
        $status = ["leave", "absent"];
        for($i = 1; $i <= 50; $i++){
            $currentDate = "2025-01-23";
            $presentTime = $this->generateRandomTime('07:30', '08:30', $currentDate);
            $leaveTime = $this->generateRandomTime('16:30', '17:00', $currentDate);

            // Convert strings to Carbon instances
            $present = Carbon::parse($presentTime);
            $leave = Carbon::parse($leaveTime);

            // Calculate the difference in hours
            $workingHours = $present->floatDiffInHours($leave);

            $attendanceStatus = $status[rand(0,1)];

            if($attendanceStatus == "absent") {
                Attendance::create([
                    "employee_id" => $i,
                    "date" => $currentDate,
                    "working_hours" => 0,
                    "status" => $attendanceStatus,
                ]);
            } else {
                Attendance::create([
                    "employee_id" => $i,
                    "date" => $currentDate,
                    "working_hours" => $workingHours,
                    "status" => $attendanceStatus,
                    "created_at" => $presentTime,
                    "updated_at" => $leaveTime
                ]);
            }


            
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
