<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Organization::create([
            'name' => 'Oil and Gas'
        ]);
        \App\Models\Organization::create([
            'name' => 'Industrial'
        ]);
        \App\Models\Organization::create([
            'name' => 'Construction'
        ]);
        \App\Models\Organization::create([
            'name' => 'Engineering'
        ]);
        \App\Models\Organization::create([
            'name' => 'Catering Supply'
        ]);
        \App\Models\Organization::create([
            'name' => 'Education and Training Providers'
        ]);
        \App\Models\Organization::create([
            'name' => 'Non Profit Organizations'
        ]);
        \App\Models\Organization::create([
            'name' => 'Professional Organizations'
        ]);
    }
}
