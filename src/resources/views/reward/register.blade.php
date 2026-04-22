@extends('layouts.app')

@section('css')
@endsection

@section('header')
@include('partials.header')
@endsection

@section('content')
@include('partials.sidebar')

<h2 class="ttl">報奨新規登録</h2>
<form action="{{ route('reward.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">報奨名</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div class="form-group">
        <label for="point">必要ポイント</label>
        <input type="number" name="point" id="point" required>
    </div>
    <div class="store-btn">
        <button type="submit">登録する</button>
    </div>
</form>
@endsection

