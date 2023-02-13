<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\User;
use App\Models\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() 
    {
        return view('posts.create');
    }

    public function store() 
    {

        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $file = str_replace("/", "\\", public_path('storage/' . $imagePath));

        $image = Image::make($file)->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' =>$imagePath,
        ]);

        return redirect('/posts');

    }

    public function show(Post $post) 
    {

        return view('posts.show', compact('post'));
    }

    public function showAll()
    {
        $posts = Post::all();

        return view('posts.showAll', [
            "posts" => $posts
        ]);
    }
}
