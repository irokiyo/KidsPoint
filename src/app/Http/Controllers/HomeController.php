<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;

class HomeController extends Controller
{
    public function index()
    {
        $children=Child::all();
        return view('index', compact('children'));
    }
}
