@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/family.css') }}" />
@endsection

@section('header')
@endsection


@section('content')
<div class="page">
    @include('partials.sidebar')
    <div class="main-content">

        <div class="card">
            <form action="{{ route('child.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="child__img">
                    <input type="file" name="img_url" id="">
                    @error('img_url')
                    <div class="error__message">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="child__detail">
                    <h3 class="card__ttl">子供の名前</h3>
                    <input type="text" name="name" class="card__input" placeholder="子供の名前を入力してください">
                    @error('name')
                    <div class="error__message">
                        {{ $message }}
                    </div>
                    @enderror
                    <h3 class="card__ttl">誕生日</h3>
                    <input type="date" name="birthday" id="">
                    @error('birthday')
                    <div class="error__message">
                        {{ $message }}
                    </div>
                    @enderror
                    <h3 class="card__ttl">性別</h3>
                    <input type="radio" name="sex" id="male" value="0">
                    <label for="male">男</label>
                    <input type="radio" name="sex" id="female" value="1">
                    <label for="female">女</label>
                    <input type="radio" name="sex" id="prefer_not_to_say" value="2">
                    <label for="prefer_not_to_say">選択しない</label>
                    @error('sex')
                    <div class="error__message">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="submit__btn">
                    <button type="submit" class="btn__submit">登録</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

