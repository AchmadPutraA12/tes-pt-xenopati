<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\EmpPresence;
use App\Models\EmpSalary;
use Faker\Factory as Faker;

class EmpSalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $employees = Employee::all();

        foreach ($employees as $employee) {
            $empPresence = EmpPresence::where('employee_id', $employee->id)
                ->orderBy('check_in', 'desc')
                ->first();

            $bonus = 0;

            if ($empPresence) {
                $masuk = \Carbon\Carbon::parse($empPresence->check_in);
                $cekMasuk = \Carbon\Carbon::parse('08:00:00');
                $terlambatHitunganMenit = $masuk->diffInMinutes($cekMasuk, false);

                if ($terlambatHitunganMenit < 0 && abs($terlambatHitunganMenit) > 5) {
                    $bonus = abs($terlambatHitunganMenit) * 5000;
                } elseif ($terlambatHitunganMenit > 0) {
                    $bonus = abs($terlambatHitunganMenit) * 5000;
                }

                $pulang = \Carbon\Carbon::parse($empPresence->check_out);
                $cekPulang = \Carbon\Carbon::parse('17:00:00');
                $pulangAwal = $pulang->diffInMinutes($cekPulang, false);

                if ($pulangAwal < 0 && abs($pulangAwal) > 5) {
                    $bonus += abs($pulangAwal) * 5000;
                }
            }

            $gajiPokok = $faker->randomFloat(2, 3000000, 7000000);

            $bpjs = 0.02 * $gajiPokok;
            $jp = 0.01 * $gajiPokok;

            $loan = $faker->randomFloat(2, 0, 1000000);

            $totalSalary = $gajiPokok + $bonus - $bpjs - $jp - $loan;

            EmpSalary::create([
                'employee_id' => $employee->id,
                'month' => rand(1, 12),
                'year' => 2024,
                'basic_salary' => $gajiPokok,
                'bonus' => $bonus,
                'bpjs' => $bpjs,
                'jp' => $jp,
                'loan' => $loan,
                'total_salary' => $totalSalary,
            ]);
        }
    }
}
