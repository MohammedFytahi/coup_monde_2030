<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'image'];
    public function likes()
    {
        return $this->hasMany(ArticleLike::class);
    }
    // public function likesCount()
    // {
    //     return $this->likes()->count();
    // }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
