<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        $bookTitle = [
            'The Fellowship of the Ring',
            'The Two Towers',
            'The Return of the King',
            'The Hobbit',
            'The Silmarillion',
            'The Children of Húrin',
            'Unfinished Tales',
            'The History of Middle-earth',
            'The Book of Lost Tales',
            'The Lays of Beleriand',
            'The Shaping of Middle-earth',
            'The Lost Road and Other Writings',
            'The Return of the Shadow',
            'The Treason of Isengard',
            'The War of the Ring',
            'Sauron Defeated',
            'Io sono leggenda',
            'Harry Potter and the Philosopher\'s Stone',
        ];

        foreach ($bookTitle as $title) {
            Book::create([
                'title' => $title,
            ]);
        }

        Book::create([
            'title' => 'Bumi',
            'author' => 'Tere Liye',
            'description' => 'Bumi adalah sebuah novel karangan Tere Liye yang diterbitkan pada tahun 2014. Novel ini merupakan novel pertama dari serial Bumi. Novel ini menceritakan tentang perjalanan seorang anak bernama Bumi yang memiliki kemampuan untuk melihat makhluk halus.',
            'price' => 100000,
            'date_published' => '2014-01-16',
            'publisher' => 'Gramedia Pustaka Utama',
            'page_count' => 440,
        ]);

        Book::create([
            'title' => 'Dune',
            'author' => 'Frank Herbert',
            'description' => 'Dune is a 1965 science-fiction novel by American author Frank Herbert, originally published as two separate serials in Analog magazine. It tied with Roger Zelaznys This Immortal for the Hugo Award in 1966, and it won the inaugural Nebula Award for Best Novel.',
            'price' => 500000,
            'date_published' => '1965-08-01',
            'publisher' => 'Chilton Books',
            'page_count' => 896,
        ]);

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
