<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            'name' => 'Islam Bassiem',
            'email' => 'islam@example.com',
            'employee_code' => '500322',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $users = [];
        for ($i = 1; $i <= 200; $i++) {
            $users[] = [
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'employee_code' => fake()->unique()->numberBetween(500001, 501050),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => fake()->randomElement([null, now()->toDateTimeString()]),
                'updated_at' => fake()->randomElement([null, now()->toDateTimeString()]),
            ];
        }

        User::insert($users);
    }
}
