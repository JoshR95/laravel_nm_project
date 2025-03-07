<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'email' => $this->faker->unique()->companyEmail(),
            'logo' => "https://picsum.photos/seed/" . $this->faker->unique()->uuid . "/100/100",
            'website' => $this->faker->url(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
} 