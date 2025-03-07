<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        // Get all companies
        $companies = Company::all();

        // If there are no companies, create some
        if ($companies->isEmpty()) {
            $this->call(CompanySeeder::class);
            $companies = Company::all();
        }

        // Create a total of 50 employees distributed across all companies
        // First, create one employee per company to ensure each company has at least one
        foreach ($companies as $company) {
            Employee::factory()->create([
                'company_id' => $company->id
            ]);
        }

        // Calculate remaining employees to create
        $remainingEmployees = 50 - $companies->count();
        
        // Create remaining employees with random company assignments
        if ($remainingEmployees > 0) {
            Employee::factory()->count($remainingEmployees)->create([
                'company_id' => function() use ($companies) {
                    return $companies->random()->id;
                }
            ]);
        }
    }
} 