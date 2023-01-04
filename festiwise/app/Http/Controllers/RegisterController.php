<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('register.index',['title' => 'register']);
    }
    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        return redirect('/login')->with('success','Registration successful! Please login');
    }
}
