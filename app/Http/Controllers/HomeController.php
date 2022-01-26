<?php

namespace App\Http\Controllers;

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
        $data['editors_picks'] = Post::with('author','category')->where('is_editors_pick',1)
            ->where('status','Published')
            ->limit(4)->get();
        //dd($data);
        return view('front.index',$data);
    }
}
