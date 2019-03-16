<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function showCreateForm()
    {
        return view('posts.create');
    }

    public function create(PostRequest $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;

        Auth::user()->posts()->save($post);

        return redirect()->route('top');
    }

    public function show(int $id)
    {
        $post = Post::find($id);

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function showEditForm(int $id)
    {
        $post = Post::find($id);
        
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function edit(PostRequest $request)
    {
        $post = Post::find($request->id);
        
        $post->title = $request->title;
        $post->body = $request->body;

        Auth::user()->posts()->save($post);

        return redirect()->route('posts.show', [
            'id' => $request->id,
        ]);
    }

    public function delete(int $id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect('/');
    }
}
