<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $casts = [
        'date_published' => 'date'
    ];

    protected $fillable = [
        'title',
        'book_seo', // 'book_seo' is the slug of the book title
        'author',
        'description',
        'publisher',
        'date_published',
        'price',
        'page_count',
        'cover_url'
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }   
}
