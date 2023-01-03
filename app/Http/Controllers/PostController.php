<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller; 

class PostController extends Controller
{
    
    public function index(){


        
        return view('posts',[
            "title" => "All Posts",
            // "posts" => Post::all(),
            "posts" => Post::latest()->filter(request(['search','category','author']))->get(),
        ]);
    }
    public function show(Post $post) {
        return view('detail',[
            "title" => "single post",
            "post" => $post
        ]);
    }
}
