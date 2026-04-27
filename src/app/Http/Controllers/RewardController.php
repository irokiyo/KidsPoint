<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RewardRequest;
use App\Models\Reward;

class RewardController extends Controller
{
    public function index()
    {
        $rewards = Reward::all();
        return view('reward.index', compact('rewards'));
    }
    public function create()
    {
        return view('reward.register');
    }
    public function store(RewardRequest $request)
    {
        Reward::create([
            'name' => $request->name,
            'point' => $request->point,
        ]);
        return redirect()->route('reward.index')->with('success', '登録しました。');
    }
    public function update(RewardRequest $request, Reward $reward)
    {
        $reward->update([
            'name' => $request->name,
            'point' => $request->point,
        ]);
        return redirect()->route('reward.index')->with('success', '更新しました。');
    }
    public function destroy(Reward $reward)
    {
        $reward->delete();
        return redirect()->route('reward.index')->with('success', '削除しました。');
    }
}
