<?php

namespace Database\Factories;

use App\Enums\GenderEnum;
use App\Enums\MaritallyEnum;
use App\Enums\ReligionEnum;
use App\Enums\VacationEnum;
use App\Models\Country;
use App\Models\Insurance;
use App\Models\Needs;
use App\Models\Sponsorship;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->unique()->numberBetween(1, 200),
            'head_id' => fake()->randomElement([User::pluck('id')->random(), null]),

            'first_name_en' => fake('en')->firstName(),
            'middle_name_en' => fake('en')->randomElement([null, fake('en')->firstName()]),
            'third_name_en' => fake('en')->randomElement([null, fake('en')->firstName()]),
            'last_name_en' => fake('en')->lastName(),
            'first_name_ar' => fake('ar')->firstName(),
            'middle_name_ar' => fake('ar')->randomElement([null, fake('ar')->firstName()]),
            'third_name_ar' => fake('ar')->randomElement([null, fake('ar')->firstName()]),
            'last_name_ar' => fake('ar')->lastName(),

            'gender' => fake()->randomElement(GenderEnum::toArray()),
            'maritally' => fake()->randomElement([collect(MaritallyEnum::cases())->random()->value, null]),
            'nationality_id' => Country::pluck('id')->random(),
            'religion' => fake()->randomElement([collect(ReligionEnum::cases())->random()->value, null]),
            'home_country_id' => fake()->randomElement([null, fake()->regexify('[A-Z]{2}[0-9]{8}')]),
            'date_of_birth' => fake()->randomElement([null, fake()->date()]),
            'place_of_birth' => fake()->randomElement([Country::pluck('id')->random(), null]),

            'phone' => fake()->randomElement([null, fake()->phoneNumber()]),
            'mobile' => fake()->randomElement([null, fake()->phoneNumber()]),
            'personal_email' => fake()->unique()->safeEmail(),

            'is_active' => fake()->boolean(30),
            'has_salary' => fake()->boolean(90),
            'has_biometric' => fake()->boolean(80),
            'works_on_saturday' => fake()->boolean(20),
            'has_married_contract' => fake()->boolean(10),

            'sponsorship_id' => Sponsorship::pluck('id')->random(),
            'joining_date' => fake()->date(),
            'resignation_date' => fake()->randomElement([null, fake()->date()]),
            'vacation' => collect(VacationEnum::cases())->random()->value,
            'needs_id' => fake()->randomElement([Needs::pluck('id')->random(), null]),
            'insurance_id' => fake()->randomElement([Insurance::pluck('id')->random(), null]),

            'created_by' => fake()->randomElement([User::pluck('id')->random(), null]),
            'updated_by' => fake()->randomElement([User::pluck('id')->random(), null]),
        ];
    }
}
