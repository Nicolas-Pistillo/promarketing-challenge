<?php

namespace Database\Seeders;

use App\Models\SupportAgent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SupportAgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SupportAgent::create([
            'name' => 'Agente viewer',
            'employee_number' => 177551230,
            'email' => 'viewer-agent@gmail.com',
            'password' => Hash::make('password')
        ])->assignRole('support-viewer');

        SupportAgent::create([
            'name' => 'Agente operativo',
            'employee_number' => 177551231,
            'email' => 'operative-agent@gmail.com',
            'password' => Hash::make('password')
        ])->assignRole('support-operative');

        SupportAgent::create([
            'name' => 'Agente administrador',
            'employee_number' => 177551232,
            'email' => 'administrator-agent@gmail.com',
            'password' => Hash::make('password')
        ])->assignRole('support-admin');
    }
}
