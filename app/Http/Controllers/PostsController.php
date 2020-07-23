<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;
// use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
     public function __construct()
     {
         $this->middleware('auth');
     }

     public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
      
 
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
     
        return view('posts.index', compact('posts'));
    }
    public function create()
    {
         return view('posts.create');
    }
    public function show(Post $post)
    { 
         
         return view('posts.show',compact('post'));
    }
    public function store(Request $request)
    {
     $request->validate([
          'caption' => 'required',
          'image' => ['required','image'],
      ]);
         $file = $request->image->store('uploads','public');
     //     $image = Image::make(public_path("storage/{$file}"))->fit(120,120);//primero hacer composer require intervention/image y poner la linea 6
         auth()->user()->posts()->create([
              "caption" => $request->caption,
              "image" => $file,
         ]);
         return redirect('/profile/'.auth()->user()->id);
     //     return redirect()->back()->with('message', 'Post Created  Successfully');
    }
}
