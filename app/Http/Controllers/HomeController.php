<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use function view;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['editors_picks'] = Post::with('author','category')
            ->where('is_editors_pick',1)
            ->where('status','Published')
            ->limit(4)->orderBy('id','DESC')->get();

        $data['trendings'] = Post::with('author','category')
            ->where('is_trending',1)
            ->where('status','Published')
            ->limit(4)->orderBy('id','DESC')->get();

        $data['categories'] = Category::with(['posts'=>function($query){
            $query->orderBy('id','DESC');
        }])
            ->where('is_featured',1)
            ->limit(2)->get();

        $data['recent_posts'] = Post::with('author','category')
            ->where('status','Published')
            ->limit(3)->orderBy('id','DESC')->get();

        $data['popular_posts'] = Post::popular();
//        dd($data);
        return view('front.index',$data);
    }
}
