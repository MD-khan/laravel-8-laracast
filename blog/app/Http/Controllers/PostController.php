<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        //dd(request('search'));
        #$posts = Post::latest()->filter()->get();

        return view('posts', [
            #'posts' => Post::all() # this will cause the n+1 issue
            'posts' => Post::latest()->filter(request(['search']))->get(), # this is the solution
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }
}
