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
        <div class="ttl">
            <h2 class="ttl_text">お手伝いリスト</h2>
            <a href="{{ route('task.create') }}" class="link">＋</a>
        </div>
        @foreach($tasks as $task)
        <div class="item-list">
            <p class="card__task__name">{{$task->title}}</p>
            <p class="card__task__point">{{$task->point}}ポイント</p>

            <div class="action__btn">
                <a href="{{ route('task.create', ['task' => $task->id]) }}" class="edit__link">編集</a>
                <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="POST">
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

