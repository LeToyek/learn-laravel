<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $author){
        return view('posts',[
            "title" => "Post by Author : $author->name",
            "author" => $author,
            "posts" => $author->posts->load('category','user')
        ]);
    }
}
