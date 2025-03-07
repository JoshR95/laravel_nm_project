<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // AdminUserSeeder::class, // Commented out to avoid unique constraint violation
            CompanySeeder::class,
            EmployeeSeeder::class
        ]);
    }
}