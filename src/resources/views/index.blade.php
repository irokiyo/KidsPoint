@extends('layouts.app')

@section('css')
@endsection

@section('header')
@include('partials.header')
@endsection

@section('content')
@include('partials.sidebar')
<div class="ttl">
    <h2>{{ $currentDate }}のお手伝い</h2>
</div>
<div class="card">
    @foreach($children as $child)
    <div class="card__child-info">
        <div class="child__profile">
            <img src="{{ \Storage::url($child->img_url) }}" class="card__child__img" alt="プロフィール画像">
            <p class="card__child__name">{{$child->name}}</p>
        </div>
        <div class="record__url">
            <a href="" class="record__link">記録を見る</a>
        </div>
    </div>
    <div class="card__content">
        <ul class="content__list">
            <li class="content__item">
                <p class="item__ttl">今日のお手伝い</p>
                <p class="point">0ポイント</p>
            </li>
            <li class="content__item">
                <p class="item__ttl">今月のお手伝い</p>
                <p class="point">0ポイント</p>
            </li>
        </ul>
    </div>
    <div class="task__url">
        <a href="{{ route('task.select', ['child' => $child->id]) }}" class="task__link">お手伝いしたよ</a>
    </div>
    <div class="reward__url">
        <a href="" class="reward__link">ポイントを使う</a>
    </div>
</div>
@endforeach

