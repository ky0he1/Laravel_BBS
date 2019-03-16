@extends('layout')

@section('content')
<div class="container mt-4 mb-4">
    <div class="card pb-4">
        <h5 class="card-header mb-4">
            投稿
        </h5>
        
        <div class="card mr-4 ml-4 mb-2">
            <h5 class="card-header">
                {{ $post->title }}
            </h5>
            <div class="card-body">
                <p class="card-text">
                    {!! nl2br(e(str_limit($post->body, 200))) !!}
                </p>
            </div>
            <div class="card-footer">
                <span>
                    投稿者: {{ $post->user->name }}
                </span>
                <span class="float-right">
                    {{ $post->created_at->format('Y/m/d G:i') }}
                </span>
            </div>
        </div>
        <div class="mt-2 mr-4 text-right">
        <form action="{{ route('posts.delete', ['id' => $post]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">削除</button>
        </form>
    </div>
</div>
@endsection