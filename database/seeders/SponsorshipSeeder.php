<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sponsorship::create([
            'code' => '1',
            'name_en' => 'Inaya Medical Colleges',
            'name_ar' => 'كليات العناية الطبية',
        ]);

        Sponsorship::create([
            'code' => '2',
            'name_en' => 'Shining Horizons Dental Center',
            'name_ar' => 'مجمع الآفاق لطب الأسنان',
        ]);

        Sponsorship::create([
            'code' => '3',
            'name_en' => 'Inaya Cleaning',
            'name_ar' => 'العناية للنظافة',
        ]);

        Sponsorship::create([
            'code' => '4',
            'name_en' => 'Specail Iqama',
            'name_ar' => 'إقامة مميزة',
        ]);

        Sponsorship::create([
            'code' => '5',
            'name_en' => 'Not sponsored',
            'name_ar' => 'غير مكفول',
        ]);
    }
}
