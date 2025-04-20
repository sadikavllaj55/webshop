<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 50; $i++){
            User::factory()->create([
                'avatar' => "/images/avatars/avatar-$i.png",
            ]);
        }
    }
}
