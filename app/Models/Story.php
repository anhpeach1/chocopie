<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'summary',  // Make sure this matches your database column
        'content',
        'author_id',
        'age_rating',
        'language',
        'status',
        'cover_image',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function readingHistories()
    {
        return $this->hasMany(ReadingHistory::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function hashtags()
{
    return $this->hasMany(Hashtag::class);
}
}