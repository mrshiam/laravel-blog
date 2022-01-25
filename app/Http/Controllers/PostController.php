<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'List of Posts';
        $data['posts'] = Post::with('category')->orderBy('id', 'DESC')->paginate(10);
        $data['serial'] = managePaginationSerial($data['posts']);
        return view('admin.post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create New Post';
        $data['categories'] = Category::where('status', 'Active')->orderBy('name', 'ASC')->pluck('name', 'id');
        $data['authors'] = Author::where('status', 'Active')->orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'author_id' => 'required',
            'title' => 'required',
            'details' => 'required',
            'status' => 'required',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $this->fileUpload($request->image);
        }
        //        dd($data);
        Post::create($data);
        session()->flash('message', 'Post Added Successfully');
        return redirect()->route('post.index');
    }
    private function fileUpload($img)
    {
        $path = 'uploads/posts';
        $file_name = time() . rand(00000, 99999) . '.' . $img->getClientOriginalExtension();
        $img->move($path, $file_name);
        $fullPath = $path . '/' . $file_name;
        return $fullPath;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'Post Details';
        $data['post'] = Post::with('category', 'author')->findOrFail($id);
        return view('admin.post.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data['title'] = 'Edit Post';
        $data['categories'] = Category::where('status', 'Active')->orderBy('name', 'ASC')->pluck('name', 'id');
        $data['authors'] = Author::where('status', 'Active')->orderBy('name', 'ASC')->pluck('name', 'id');
        $data['post'] = $post;
        return view('admin.post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_id' => 'required',
            'author_id' => 'required',
            'title' => 'required',
            'details' => 'required',
            'status' => 'required',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $this->fileUpload($request->image);
            if ($post->image && file_exists($post->image)) {
                unlink($post->image);
            }
        }
        if (!$request->has('is_featured')) {
            $data['is_featured'] = 0;
        }
        //        dd($data);
        $post->update($data);
        session()->flash('message', 'Post Updated Successfully');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->image && file_exists($post->image)) {
            unlink($post->image);
        }
        $post->delete();
        session()->flash('message', 'Post Deleted Successfully');
        return redirect()->route('post.index');
    }
}
