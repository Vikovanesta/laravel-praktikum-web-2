<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'name',
        'description',
        'image',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
