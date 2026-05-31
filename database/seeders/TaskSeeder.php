<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Task::create([
        'title' => 'Preparar entrega',
        'description' => 'Finalizar proyecto Laravel',
        'status' => 'pending',
        'user_id' => 1
        ]);

        \App\Models\Task::create([
        'title' => 'Documentación',
        'description' => 'Actualizar README',
        'status' => 'pending',
        'user_id' => 1
        ]);
    }
}
