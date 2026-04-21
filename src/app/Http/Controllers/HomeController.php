<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Child;

class HomeController extends Controller
{
    public function index()
    {
        $currentDate = Carbon::now()->format('Y年m月d日');
        $children=Child::all();
        return view('index', compact('children', 'currentDate'));
    }
}
