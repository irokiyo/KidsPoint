@extends('layouts.app')

@section('css')
@endsection

@section('header')
@endsection

@section('content')
<div class="page">
    @include('partials.sidebar')
    <div class="main-content">
        <h2 class="ttl">報奨新規登録</h2>
        <form action="{{ route('reward.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">報奨名</label>
                <input type="text" name="name" id="name">
                @error('name')
                <div class="error__message">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="point" class="form-label">必要ポイント</label>
                <input type="number" name="point" id="point">
                @error('point')
                <div class="error__message">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="store-btn">
                <button type="submit">登録する</button>
            </div>
        </form>
    </div>
</div>
@endsection

