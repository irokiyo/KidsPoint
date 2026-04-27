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
        <div class="ttl">
            <h2 class="ttl__text">子供リスト</h2>
            <a href="{{ route('child.create') }}" class="link">＋</a>
        </div>
        @foreach($children as $child)
        <div class="card">
            <div class="child-list">
                <div class="child__info">
                    <img src="{{ \Storage::url($child->img_url) }}" alt="プロフィール画像" class="card__child__img">
                    <p class="card__child__name">{{$child->name}}</p>
                </div>
                <div class="action__btn">
                    <a href="{{route('child.show', $child->id)}}" class="detail__btn">詳細</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

