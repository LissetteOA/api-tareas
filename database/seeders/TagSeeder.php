<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Tag::create([
        'nombre' => 'Urgente',
        'color' => '#FF0000'
        ]);

        \App\Models\Tag::create([
        'nombre' => 'Trabajo',
        'color' => '#0000FF'
        ]);

        \App\Models\Tag::create([
        'nombre' => 'Personal',
        'color' => '#00AA00'
        ]);
    }
}
