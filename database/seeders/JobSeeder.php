<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $employers = User::where('role', 'employer')->get();

        foreach ($employers as $employer) {
            Job::factory()
                ->count(5)
                ->create([
                    'user_id' => $employer->id
                ]);
        }
    }
}
