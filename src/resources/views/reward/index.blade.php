@extends('layouts.app')

@section('css')
@endsection

@section('header')
@include('partials.header')
<a href="{{ route('reward.create') }}" class="link">＋</a>
@endsection

@section('content')
@include('partials.sidebar')

<h2 class="ttl">報奨リスト</h2>
@foreach($rewards as $reward)
<div class="card">
    <p class="card__reward__name">{{$reward->name}}</p>
    <p class="card__reward__point">{{$reward->point}}ポイント</p>
</div>
<div class="delete__btn">
    <form action="{{ route('reward.destroy', ['reward' => $reward->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete__link" onclick="return confirm('本当に削除しますか？')">削除</button>
    </form>
</div>
@endforeach
@endsection

