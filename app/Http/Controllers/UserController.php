<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $author){
        return view('author-posts',[
            "title" => "author",
            "author" => $author
        ]);
    }
}
