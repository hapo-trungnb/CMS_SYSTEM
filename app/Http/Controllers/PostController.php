<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{
    //

    public function show(Post $post)
    {
        return  view('blog-post', ['post' => $post]);
    }
    public function create()
    {
        return view('admin.posts.create');
    }
    public function store()
    {
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'mimes:jpeg,bmp,png,jpg,gif',
            'body' => 'required'
        ]);
        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        };
        $user = auth()->user()->posts()->create($inputs);

        return back();
    }
}
