<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function showCreateForm(int $id)
    {
        return view('comments.create', [
            'id' => $id,
        ]);
    }

    public function create(CommentRequest $request)
    {
        $comment = new Comment;

        $comment->post_id = $request->id;
        $comment->comment = $request->comment;
        Auth::user()->comments()->save($comment);
        

        return redirect('posts/show/' . $request->id);
    }
}
