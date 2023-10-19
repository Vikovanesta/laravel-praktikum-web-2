<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        \App\Models\Character::factory(10)->create();
        \App\Models\Book::factory(50)->create();
    }
}
