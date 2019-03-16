@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="card w-75 mx-auto">
        <h5 class="card-header">
            プロフィール
        </h5>
        <div class="card-body mx-auto text-center">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="list-style: none;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($is_image)
                <img src="./storage/profile_images/{{ Auth::id() }}.jpg" style="border-radius: 5px;" width="100px" height="100px">
            @else
                <img src="./storage/profile_images/sample.jpg" style="border-radius: 5px;" width="100px" height="100px">
            @endif
            <h5 class="mt-3">ユーザー名：{{ $user_name }}</h5>
            <h5>掲示板投稿数：{{ $post_count }} 件</h5>
            <form method="POST" action="./profile" enctype="multipart/form-data">
                @csrf
                <input type="file" name="photo">
                <input class="btn btn-primary" type="submit">
            </form>
        </div>
    </div>
    <div class="card pb-4 w-75 mx-auto mt-4">
        <h5 class="card-header">
            投稿一覧
        </h5>
        @foreach ($user_posts as $post)
        <div class="card-body border-bottom mr-4 ml-4">
            <h4 class="card-title">
                {{ $post->title }}
            </h4>
            <p class="card-text">
                {!! nl2br(e(str_limit($post->body, 200))) !!}
            </p>
            <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="card-link">詳細</a>
            <div class="mt-2">
                <span>
                    投稿者: {{ $post->user->name }}
                </span>
                <span class="float-right">
                    {{ $post->created_at->format('Y/m/d G:i') }}
                </span>

                @if ($post->comments->count())
                <span class="ml-2 badge badge-primary">
                    コメント {{ $post->comments->count() }}件
                </span>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection 