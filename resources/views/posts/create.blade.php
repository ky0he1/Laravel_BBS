@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="card w-75 mx-auto">
        <h5 class="card-header">
            新規登録
        </h5>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $message)
                <p>{{ $message }}</p>
                @endforeach
            </div>
            @endif
            <form action="{{ route('posts.create') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">
                        タイトル
                    </label>
                    <input id="title" name="title" class="form-control" value="{{ old('title') }}" type="text">
                </div>
                <div class="form-group">
                    <label for="body">
                        本文
                    </label>
                    <textarea id="body" name="body" class="form-control" rows="6">{{ old('body') }}</textarea>
                </div>
                <div class="text-right">
                    <a class="btn btn-secondary" href="{{ route('top') }}">
                        キャンセル
                    </a>
                    <button type="submit" class="btn btn-primary">
                        投稿する
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 