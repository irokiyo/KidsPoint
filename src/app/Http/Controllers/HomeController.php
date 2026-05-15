<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Child;
use App\Models\TaskRecord;
use Yasumi\Yasumi;

class HomeController extends Controller
{
    public function index()
    {
        $currentDate = Carbon::now()->format('Y年m月d日');
        $children=Child::all();
        return view('index', compact('children', 'currentDate'));
    }
    public function calendar(Child $child)
    {
        $currentDate = Carbon::now()->format('Y年m月');
        $dates = [];

        $holidays = Yasumi::create('Japan', Carbon::now()->year);

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        for ($date = $startOfMonth->copy(); $date <= $endOfMonth; $date->addDay()) {
            $dates[] = [
            'date' => $date->copy(),
            'isHoliday' => $holidays->isHoliday($date->copy()),
            'isSunday' => $date->isSunday(),
            'isSaturday' => $date->isSaturday(),
            'totalPoints' => TaskRecord::where('child_id', $child->id)
                ->whereDate('recorded_at', $date)
                ->sum('point'),
            ];
        }

        return view('home.calendar', compact('dates', 'currentDate', 'startOfMonth', 'endOfMonth'));
    }
}
