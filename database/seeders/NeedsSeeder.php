<?php

namespace Database\Seeders;

use App\Models\Needs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NeedsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $needs = [
            [
                'code' => '1',
                'name_en' => 'Physical Disability',
                'name_ar' => 'إعاقة جسدية',
            ],
            [
                'code' => '2',
                'name_en' => 'Health Impairment',
                'name_ar' => 'إعاقة صحية',
            ],
            [
                'code' => '3',
                'name_en' => 'Hearing Disability',
                'name_ar' => 'إعاقة سمعية',
            ],
            [
                'code' => '4',
                'name_en' => 'Hearing Impairment',
                'name_ar' => 'ضعف سمع',
            ],
            [
                'code' => '5',
                'name_en' => 'Visual Disability',
                'name_ar' => 'إعاقة بصرية',
            ],
            [
                'code' => '6',
                'name_en' => 'Visual Impairment',
                'name_ar' => 'ضعف بصر',
            ],
            [
                'code' => '7',
                'name_en' => 'Mental Disability',
                'name_ar' => 'إعاقة عقلية',
            ],
            [
                'code' => '8',
                'name_en' => 'Cerebral Palsy',
                'name_ar' => 'شلل دماغي',
            ],
            [
                'code' => '9',
                'name_en' => 'Autism',
                'name_ar' => 'توحد',
            ],
            [
                'code' => '10',
                'name_en' => 'ADHD',
                'name_ar' => 'فرط حركة وتشتت انتباه',
            ],
            [
                'code' => '11',
                'name_en' => 'Learning Difficulties',
                'name_ar' => 'صعوبات التعلم',
            ],
            [
                'code' => '12',
                'name_en' => 'Speech Language Difficulties',
                'name_ar' => 'صعوبات الكلام واللغة',
            ],
            [
                'code' => '13',
                'name_en' => 'Slow Learning',
                'name_ar' => 'بطئ تعلم',
            ],
            [
                'code' => '14',
                'name_en' => 'Other',
                'name_ar' => 'أخرى',
            ],
        ];

        Needs::insert($needs);
    }
}
