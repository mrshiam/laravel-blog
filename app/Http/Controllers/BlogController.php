<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use function Sodium\increment;

class BlogController extends Controller
{
    public function show($id)
    {
        Post::findOrFail($id)->increment('total_read');
        $data['post'] = Post::with('author','category')->findOrFail($id);
        $data['popular_posts'] = Post::popular();
        return view('front.post.show',$data);
    }
}
