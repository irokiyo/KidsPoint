@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/family.css') }}" />
@endsection

@section('header')
@include('partials.header')
@endsection

@section('content')
<div class="page">
    @include('partials.sidebar')
    <div class="main-content">
        <div class="ttl">
            <h2 class="ttl__text">{{ $currentDate }}のお手伝い</h2>
        </div>
        @foreach($children as $child)
        <div class="card">
            <div class="child-list">
                <div class="child-profile">
                    <img src="{{ \Storage::url($child->img_url) }}" class="child-profile__img" alt="プロフィール画像">
                    <p class="child-profile__name">{{$child->name}}</p>
                </div>
                <div class="record__url">
                    <a href="" class="card__sub-link">記録を見る</a>
                </div>
            </div>
            <div class="card__content">
                <ul class="content__list">
                    <li class="content__item">
                        <p class="item__ttl">今日のお手伝い</p>
                        <p class="point">{{ $child->totalDayPoint() }}ポイント</p>
                    </li>
                    <li class="content__item">
                        <p class="item__ttl">溜まっているポイント</p>
                        <p class="point">{{ $child->totalPoint() }}ポイント</p>
                    </li>
                </ul>
            </div>
            <div class="card__url">
                <a href="{{ route('task.select', ['child' => $child->id]) }}" class="card__button">お手伝いしたよ</a>
            </div>
            <div class="card__url">
                <a href="{{ route('reward.log', ['child' => $child->id]) }}" class="card__button">ポイントを使う</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

