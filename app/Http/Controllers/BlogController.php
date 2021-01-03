<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function comment($slug)
    {
        $post = Post::where('slug','=', $slug)->first();

        return view('blog.comment', compact('post'));
    }

    public function index() 
    {
        $posts = Post::paginate(2);

        return view('blog.index', compact('posts'));
    }



}
