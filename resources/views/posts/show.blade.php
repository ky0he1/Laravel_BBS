@extends('layout')

@section('content')
<div class="container mt-4 mb-4">
    <div class="card pb-4 w-75 mx-auto">
        <h5 class="card-header mb-4">
            投稿
        </h5>
        <div class="card-body mr-4 ml-4 border-bottom">
            <h4 class="card-title">
                {{ $post->title }}
            </h4>
            <p class="card-text">
                {!! nl2br(e(str_limit($post->body, 200))) !!}
            </p>
            <div class="mt-2">
                <span>
                    投稿者: {{ $post->user->name }}
                </span>
                <span class="float-right">
                    {{ $post->created_at->format('Y/m/d G:i') }}
                </span>
            </div>
        </div>
        @if (Auth::id() === $post->user->id)
        <div class="mr-4 text-right">
            <a href="{{ route('posts.edit', ['id' => $post]) }}" class="btn btn-primary mt-4">
                編集
            </a>
            <form action="{{ route('posts.delete', ['id' => $post]) }}" method="post" style="display: inline-block;">
                @csrf
                <button type="submit" class="btn btn-danger btn-dell mt-4">
                    削除
                </button>
            </form>

        </div>
        @endif
        @if (Auth::check() && Auth::id() !== $post->user->id)
        <div class="text-right mr-4 mt-4">
            <a href="{{ route('comments.create', ['id' => $post]) }}" class="btn btn-primary">コメントする</a>
        </div>
        @endif
    </div>
    <div class="card pb-4 w-75 mx-auto mt-4">
        <h5 class="card-header">
            コメント
        </h5>
        <div class="card-body">
            @foreach ($post->comments as $comment)
            <div class="card-title h5">>> {{ $comment->user->name }}</div>
            <div class="card-text">{{ $comment->comment }}</div>
            <div class="text-right">
                <div class="card-text">{{ $comment->created_at->format('Y/m/d G:i') }}</div>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection 