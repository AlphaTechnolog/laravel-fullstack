<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
            'user_id' => 1,
            'name' => "Go to the park",
            "description" => "I want to go to the park",
        ]);
    }
}
