<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $is_image = false;
        if (Storage::disk('local')->exists('public/profile_images/' . Auth::id() . '.jpg')) {
            $is_image = true;
        }

        $user_name = Auth::user()->name;
        $user_posts = Auth::user()->posts()->get();
        $post_count = $user_posts->count();

        return view('profile.index', [
            'is_image' => $is_image,
            'user_name' => $user_name,
            'user_posts' => $user_posts,
            'post_count' => $post_count,
            ]);
    }

    public function store(ProfileRequest $request)
    {
        $request->photo->storeAs('public/profile_images', Auth::id() . '.jpg');

        return redirect('profile')->with('success', '新しいプロフィールを登録しました');
    }
}

