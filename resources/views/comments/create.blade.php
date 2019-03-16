@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="card w-75 mx-auto">
        <h5 class="card-header">
            コメント
        </h5>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $message)
                <p>{{ $message }}</p>
                @endforeach
            </div>
            @endif
            <form action="{{ route('comments.create', ['id' => $id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="comment">
                        コメント
                    </label>
                    <textarea id="comment" name="comment" class="form-control" rows="6">{{ old('body') }}</textarea>
                </div>
                <div class="text-right">
                    <a class="btn btn-secondary" href="{{ route('posts.show', ['id' => $id]) }}">
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