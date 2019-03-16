@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="card w-75 mx-auto">
        <h5 class="card-header">
            編集
        </h5>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $message)
                <p>{{ $message }}</p>
                @endforeach
            </div>
            @endif
            <form action="{{ route('posts.edit', ['id' => $post]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">
                        タイトル
                    </label>
                    <input id="title" name="title" class="form-control" value="{{ old('$post->title') ?? $post->title }}" type="text">
                </div>
                <div class="form-group">
                    <label for="body">
                        本文
                    </label>
                    <textarea id="body" name="body" class="form-control" rows="6">{{ old('$post->body') ?? $post->body }}</textarea>
                </div>
                <div class="text-right">
                    <a class="btn btn-secondary" href="{{ route('posts.show', ['id' => $post]) }}">
                        キャンセル
                    </a>
                    <button type="submit" class="btn btn-primary">
                        編集
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 