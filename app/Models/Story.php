<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'summary',
        'content',
        'author_id',
        'status',
        'age_rating',
        'language',
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
        return $this->belongsToMany(Category::class, 'story_category'); // Nếu bạn có bảng trung gian story_category
    }

    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class, 'story_hashtag');
    }
}