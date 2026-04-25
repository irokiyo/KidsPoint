@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
<link rel="stylesheet" href="{{ asset('css/auth.css') }}" />
@endsection

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <h2 class="auth-title">ログイン</h2>

        <form action="" method="POST" class="login-form">
            @csrf
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password">
                @error('password')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="auth__btn">ログインする</button>
        </form>

        <a href="{{route('register')}}" class="auth-link">会員登録はこちら</a>
    </div>
</div>
@endsection

