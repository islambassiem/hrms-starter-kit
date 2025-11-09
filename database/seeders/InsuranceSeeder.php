<?php

namespace Database\Seeders;

use App\Models\Insurance;
use Illuminate\Database\Seeder;

class InsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            [
                'code' => '1',
                'name_en' => 'VVIP',
                'name_ar' => 'VVIP',
            ],
            [
                'code' => '2',
                'name_en' => 'VIP+',
                'name_ar' => 'VIP+',
            ],
            [
                'code' => '3',
                'name_en' => 'VVIP Single Female Employee with Parents',
                'name_ar' => 'VVIP موظفة عزباء مع والديها',
            ],
            [
                'code' => '4',
                'name_en' => 'VIP Single Female Employee with Parents',
                'name_ar' => 'VIP موظفة عزباء مع والديها',
            ],
            [
                'code' => '5',
                'name_en' => 'A Single Female Employee with Parents',
                'name_ar' => 'A موظفة عزباء مع والديها',
            ],
            [
                'code' => '6',
                'name_en' => 'A2 Single Female Employee with Parents',
                'name_ar' => 'A2 موظفة عزباء مع والديها',
            ],
            [
                'code' => '7',
                'name_en' => 'A+',
                'name_ar' => 'A+',
            ],
            [
                'code' => '8',
                'name_en' => 'A+ Single Female Employee with Parents',
                'name_ar' => 'A+ موظفة عزباء مع والديها',
            ],
            [
                'code' => '9',
                'name_en' => 'VIP',
                'name_ar' => 'VIP',
            ],
            [
                'code' => '10',
                'name_en' => 'A',
                'name_ar' => 'A',
            ],
            [
                'code' => '11',
                'name_en' => 'A2',
                'name_ar' => 'A2',
            ],
            [
                'code' => '12',
                'name_en' => 'VVIP Single Female Employee without Maternity',
                'name_ar' => 'VVIP موظفة عزباء بدون أمومة',
            ],
            [
                'code' => '13',
                'name_en' => 'VIP+ Single Female Employee without Maternity',
                'name_ar' => 'VIP+ موظفة عزباء بدون أمومة',
            ],
            [
                'code' => '14',
                'name_en' => 'VIP Single Female Employee without Maternity',
                'name_ar' => 'VIP موظفة عزباء بدون أمومة',
            ],
            [
                'code' => '15',
                'name_en' => 'A Single Female Employee without Maternity',
                'name_ar' => 'A موظفة عزباء بدون أمومة',
            ],
            [
                'code' => '16',
                'name_en' => 'A2 Single Female Employee without Maternity',
                'name_ar' => 'A2 موظفة عزباء بدون أمومة',
            ],
        ];

        foreach ($classes as $class) {
            Insurance::create($class);
        }
    }
}
