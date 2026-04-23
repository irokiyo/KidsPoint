@extends('layouts.app')

@section('css')
@endsection

@section('header')
@include('partials.header')
@endsection

@section('content')
@include('partials.sidebar')
<div class="main-content">
<h2 class="ttl">どの景品に変える？</h2>
<form action="{{ route('reward.log', ['child' => $child->id]) }}" method="post">
    @csrf
    @foreach($rewards as $reward)
    <div class="card">
        <input type="checkbox" name="rewards[]" id="reward-{{$reward->id}}" value="{{$reward->id}}">
        <label for="reward-{{$reward->id}}">{{$reward->name}}{{$reward->point}}ポイント</label>
    </div>
    @endforeach
    <div class="total">合計: <span id="total-points">0</span>ポイント</div>
    <div class="store btn">
        <button type="submit">交換する</button>
    </div>
</form>
</div>
@endsection

