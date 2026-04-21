@extends('layouts.app')

@section('css')
@endsection

@section('header')
@include('partials.header')
<a href="{{ route('') }}" class="link">＋</a>
@endsection

@section('content')
@include('partials.sidebar')

<h2 class="ttl">お手伝いリスト</h2>
@foreach($tasks as $task)
<div class="card">
    <p class="card__task__name">{{$task->name}}</p>
    <p class="card__task__point">{{$task->point}}ポイント</p>
</div>
@endforeach
@endsection

