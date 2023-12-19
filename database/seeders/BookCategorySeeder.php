<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookCategories = [
            'Fiction',
            'Non-Fiction',
            'Mystery',
            'Science Fiction',
            'Fantasy',
            'Romance',
            'Thriller',
            'Horror',
            'Biography',
            'Self-Help',
            'Cooking',
            'History',
            'Science',
            'Technology',
            'Business',
            'Art',
            'Travel',
            'Poetry',
            'Philosophy',
            'Children',
        ];

        foreach ($bookCategories as $bookCategory) {
            BookCategory::factory()->create([
                'name' => $bookCategory,
            ]);
        }
    }
}
