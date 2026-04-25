@extends('layouts.app')

@section('css')
@endsection

@section('header')
@include('partials.header')

@endsection

@section('content')
<div class="page">
    @include('partials.sidebar')
    <div class="main-content">
        <h2 class="ttl">報奨リスト</h2>
        <a href="{{ route('reward.create') }}" class="link">＋</a>
        @foreach($rewards as $reward)
        <div class="item-list">
            <p class="card__reward__name">{{$reward->name}}</p>
            <p class="card__reward__point">{{$reward->point}}ポイント</p>
            <div class="action__btn">
                <a href="{{ route('reward.create', ['reward' => $reward->id]) }}" class="edit__link">編集</a>
                <form action="{{ route('reward.destroy', ['reward' => $reward->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete__link" onclick="return confirm('本当に削除しますか？')">削除</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

