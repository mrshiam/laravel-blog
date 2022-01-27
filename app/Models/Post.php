<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'details',
        'image',
        'is_featured',
        'is_trending',
        'is_editors_pick',
        'status',
        'total_read',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public static function popular()
    {
        return Post::with('author','category')
            ->where('status','Published')
            ->limit(4)->orderBy('total_read','DESC')->get();
    }
}
