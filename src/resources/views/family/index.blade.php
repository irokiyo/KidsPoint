@extends('layouts.app')

@section('css')
@endsection

@section('header')
@include('partials.header')
<a href="{{ route('child.create') }}" class="link">＋</a>
@endsection

@section('content')
@include('partials.sidebar')

<h2 class="ttl">子供リスト</h2>
@foreach($children as $child)
<div class="card">
    <img src="{{ \Storage::url($child->img_url) }}" alt="プロフィール画像">
    <p class="card__child__name">{{$child->name}}</p>
    <a href="{{route('child.show', $child->id)}}" class="detail__btn">詳細</a>
</div>
@endforeach
@endsection

