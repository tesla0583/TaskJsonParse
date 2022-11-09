<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         User::factory()->create([
             'name' => 'Alex',
             'login' => 'admin',
             'password' => bcrypt('password'),
             'token' => bcrypt(Str::random(10)),
             'expired_at' => now(),
         ]);
    }
}
