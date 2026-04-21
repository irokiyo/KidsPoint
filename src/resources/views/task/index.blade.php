@extends('layouts.app')

@section('css')
@endsection

@section('header')
@include('partials.header')
<a href="{{ route('task.create') }}" class="link">＋</a>
@endsection

@section('content')
@include('partials.sidebar')

<h2 class="ttl">お手伝いリスト</h2>
@foreach($tasks as $task)
<div class="card">
    <p class="card__task__name">{{$task->title}}</p>
    <p class="card__task__point">{{$task->point}}ポイント</p>
</div>
<div class="delete__btn">
    <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete__link" onclick="return confirm('本当に削除しますか？')">削除</button>
    </form>
</div>
@endforeach
@endsection

