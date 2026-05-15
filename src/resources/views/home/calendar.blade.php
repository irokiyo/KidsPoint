@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/calendar.css') }}" />
@endsection

@section('content')
<div class="page">
    @include('partials.sidebar')
    <div class="main-content">
        <h2 class="ttl">
            <span class="arrow"><</span> {{ $currentDate }} <span class="arrow">></span>
        </h2>
        <div class="calendar">
            <div class="calendar__day">日</div>
            <div class="calendar__day">月</div>
            <div class="calendar__day">火</div>
            <div class="calendar__day">水</div>
            <div class="calendar__day">木</div>
            <div class="calendar__day">金</div>
            <div class="calendar__day">土</div>
            @for ($i = 0; $i < $startOfMonth->dayOfWeek; $i++)
                <div class="calendar__empty"></div>
            @endfor
            @foreach($dates as $date)
            <div class="calendar__date 

                {{ $date['isHoliday'] ? 'holiday' : '' }}
                {{ $date['isSunday'] ? 'sunday' : '' }}
                {{ $date['isSaturday'] ? 'saturday' : '' }}
                ">{{ $date['date']->format('j') }}
                <div class="total-points">
                @if($date['totalPoints']===0)
                @else{{$date['totalPoints']}}
                @endif</div>
            </div>
            @endforeach
            @for ($i = $endOfMonth->dayOfWeek; $i < 7; $i++)
                <div class="calendar__empty"></div>
            @endfor
        </div>
    </div>
</div>

