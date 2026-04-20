@extends('layouts.app')

@section('css')
@endsection

@section('header')
@endsection


@section('content')
<div class="card">
    <div class="child__img">
        <img src="" alt="プロフィール画像">
    </div>
    <div class="child__detail">
        <h3 class="card__ttl">子供の名前</h3>
        <input type="text" name="name" class="card__input" value="{{$child->name}}">
        <h3 class="card__ttl">誕生日</h3>
        <input type="date" name="birthday" id="" value="{{$child->birthday}}">
        <h3 class="card__ttl">性別</h3>
        <input type="radio" name="sex" id="male" value="0">
        <label for="male">男</label>
        <input type="radio" name="sex" id="female" value="1">
        <label for="female">女</label>
        <input type="radio" name="sex" id="prefer_not_to_say" value="2">
        <label for="prefer_not_to_say">選択しない</label>
    </div>
    <div class="edit__btn">
        <button type="submit" class="btn__update">変更</button>
        <button type="submit" class="btn__delete" onclick="return confirm('この情報を削除しますか？')">削除</button>

    </div>
</div>
@endsection

