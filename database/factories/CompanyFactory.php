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
            'logo' => null, // We'll leave this null for now as it requires file handling
            'website' => $this->faker->url(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
} 