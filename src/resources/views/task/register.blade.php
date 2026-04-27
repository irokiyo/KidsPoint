@extends('layouts.app')

@section('css')
@endsection

@section('header')
@endsection


@section('content')
<div class="page">
    @include('partials.sidebar')
    <div class="main-content">
        <h2 class="ttl">お手伝い新規登録</h2>
        <form action="{{ route('task.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="category" class="form-label">カテゴリ</label>
                <select name="category_id" id="category_id" required>
                    <option value="">選択してください</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="error__message">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name" class="form-label">お手伝い内容</label>
                <input type="text" name="name" id="name" required>
                @error('name')
                <div class="error__message">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="point" class="form-label">ポイント</label>
                <input type="number" name="point" id="point" required>
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

