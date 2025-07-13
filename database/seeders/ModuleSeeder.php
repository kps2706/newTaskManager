<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \DB::table('modules')->insert([
        ['name' => 'Lead Management'],
        ['name' => 'Complaint Module'],
        ['name' => 'Call Center'],
        ['name' => 'CRM Core'],
    ]);
    }
}
