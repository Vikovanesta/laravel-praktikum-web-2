<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        \App\Models\Character::factory(10)->create();
        \App\Models\Book::factory(50)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => 'password',
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => 'password',
            'role' => 'user',
        ]);
    }
}
