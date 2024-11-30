<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmpPresence;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpPresenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::all();

        foreach ($employees as $employee) {
            for ($day = 1; $day <= 30; $day++) {
                $masuk = Carbon::parse('08:00:00')->addSeconds(rand(-600, 600));
                $pulang = Carbon::parse('17:00:00')->addSeconds(rand(-600, 600));

                $terlambat = $masuk->diffInSeconds(Carbon::parse('08:00:00'));
                $terlambat = $masuk < Carbon::parse('08:00:00') ? $terlambat : -$terlambat;
                $pulangAwal = $pulang->diffInSeconds(Carbon::parse('17:00:00'));
                $pulangAwal = $pulang < Carbon::parse('17:00:00') ? -$pulangAwal : 0;

                EmpPresence::create([
                    'employee_id' => $employee->id,
                    'check_in' => $masuk,
                    'check_out' => $pulang,
                    'late_in' => $terlambat,
                    'early_out' => $pulangAwal,
                ]);
            }
        }
    }
}
