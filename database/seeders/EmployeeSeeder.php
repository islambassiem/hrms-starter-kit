<?php

namespace Database\Seeders;

use App\Enums\GenderEnum;
use App\Enums\MaritallyEnum;
use App\Enums\ReligionEnum;
use App\Enums\VacationEnum;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Insurance;
use App\Models\Needs;
use App\Models\Sponsorship;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::factory()->count(200)->create();
    }
}
