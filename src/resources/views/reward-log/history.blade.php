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
        <h2 class="ttl">報奨履歴</h2>
            @foreach($rewardLogs as $log)
        <div class="item-list">
            <p class="card__reward__name">{{$log->rewarded_at}}</p>
            <p class="card__reward__name">{{$log->reward->name}}</p>
            <p class="card__reward__point">{{$log->reward->point}}ポイント</p>
        </div>
            @endforeach
    </div>
</div>
@endsection

