@extends('layout')

@section('content')
<div class="container mt-4 mb-4">
    @if (!Auth::check())
    <div class="alert alert-secondary mb-4 w-75 mx-auto">
        この掲示板にはログインしていないと投稿できません。
    </div>
    @endif
    <div class="card pb-4 w-75 mx-auto">
        <h5 class="card-header">
            投稿一覧
        </h5>
        @foreach ($posts as $post)
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