<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('blog-post', ['post' => $post]);
    }


    public function create()
    {
        return view('admin.posts.create');
    }


    public function destroy(Post $post, Request $resquest)
    {
        $post->delete();
        $resquest->session()->flash('message', 'Post was deleted');
        return back();
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
//        $inputs = request()->validate([
//            'title' => 'required|min:8|max:255',
//            'post_image' => 'mimes:jpeg,bmp,png,jpg,gif',
//            'body' => 'required'
//        ]);
        $inputs = request()->all();
        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        };
        auth()->user()->posts()->create($inputs);
        session()->flash('creted_message', 'Post was created');
        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
//        $inputs = request()->validate([
//            'title' =>'required|min:8|max:255',
//            'post_image' =>'mimes:jpeg,bmp,png,jpg,gif',
//            'body' =>'required'
//        ]);
        $inputs = request()->all();
        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        };
        $post->title = $inputs['title'];
        $post->body = $inputs['body'];
        auth()->user()->posts()->update($post);
        session()->flash('updated_message', 'Post was updated');
        return redirect()->route('post.index');
    }
}
