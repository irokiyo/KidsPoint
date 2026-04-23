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
<h2 class="ttl">どのお手伝いをしたかな？</h2>
<form action="{{ route('task.record', ['child' => $child->id]) }}" method="post">
    @csrf
    @foreach($tasks as $task)
    
    <div class="card">
        <input type="checkbox" name="tasks[]" id="task-{{$task->id}}" value="{{$task->id}}">
        <label for="task-{{$task->id}}">{{$task->title}}{{$task->point}}ポイント</label>
    </div>
    @endforeach
    <div class="store btn">
        <button type="submit">記録する</button>
    </div>
</form>
</div>
</div>
@endsection

