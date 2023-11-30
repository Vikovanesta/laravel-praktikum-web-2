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

    public function averageRating()
    {
        return ($this->ratings->where('rating', 1)->count() * 1 +
            $this->ratings->where('rating', 2)->count() * 2 +
            $this->ratings->where('rating', 3)->count() * 3 +
            $this->ratings->where('rating', 4)->count() * 4 +
            $this->ratings->where('rating', 5)->count() * 5) /
            $this->ratings->count();
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }   

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
