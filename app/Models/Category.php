<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function stories()
    {
        return $this->belongsToMany(Story::class, 'story_category'); // Nếu bạn có bảng trung gian story_category
    }
}