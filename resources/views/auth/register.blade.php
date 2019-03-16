@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="card">
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
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input
                        type="text" class="form-control" id="email" name="email"
                        value="{{ old('email') }}"
                    >
                </div>
                <div class="form-group">
                    <label for="name">ユーザー名</label>
                    <input
                        type="text" class="form-control" id="name" name="name"
                        value="{{ old('name') }}"
                    >
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password-confirm">パスワード (確認)</label>
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">送信</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection