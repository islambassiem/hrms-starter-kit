<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)
            ->withoutTwoFactor()
            ->unverified()
            ->withoutRememberToken()
            ->create();

        User::factory()
            ->withoutTwoFactor()
            ->unverified()
            ->withoutRememberToken()
            ->create([
                'name' => 'Islam Bassiem',
                'email' => 'islam@example.com',
                'employee_id' => '500322',
            ]);
    }
}
