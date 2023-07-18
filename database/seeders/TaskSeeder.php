<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        Task::create([
            'title' => 'Task 0',
            'type' => 'common_ops',
        ]);

        Task::create([
            'title' => 'Task 1',
            'type' => 'common_ops',
        ]);

        Task::create([
            'title' => 'Task 2',
            'type' => 'invoice_ops',
            'amount' => 1200,
            'currency' => '€',
        ]);

        Task::create([
            'title' => 'Task 3',
            'type' => 'custom_ops',
            'country' => 'TR',
        ]);
    }
}
