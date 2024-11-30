<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Employee::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'user_picture' => $faker->imageUrl(100, 100, 'people'),
                'password' => bcrypt('password123'),
            ]);
        }
    }
}
