<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //

    public function store(Request $request){

        $request->validate([
            'body' => 'required|string|max:255',
        ]);


        Post::create([
            'user_id' => auth()->id(),
            'body' => $request->input('body')
        ]);

        return redirect('/dashboard');
    }
}
