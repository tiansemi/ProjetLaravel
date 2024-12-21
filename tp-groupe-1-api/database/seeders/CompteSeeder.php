<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Abonne::all()->each(function ($abonne) {
            \App\Models\Compte::factory(3)->create(['abonne_id' => $abonne->id]);
        });
    }
}
