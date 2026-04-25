<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;
use App\Models\RewardLog;
use App\Models\Reward;

class RewardLogController extends Controller
{
    public function create(Child $child)
    {
        $rewards = Reward::all();
        return view('reward.select', compact('child', 'rewards'));
    }

    public function store(Request $request, Child $child)
    {
        $rewardIds = $request->input('rewards', []);
        foreach ($rewardIds as $rewardId) {
            RewardLog::create([
                'child_id' => $child->id,
                'reward_id' => $rewardId,
                'rewarded_at' => now(),
                'quantity' => 1,
                'used_point' => Reward::find($rewardId)->point,
            ]);
        }
        return redirect()->route('home')->with('success', '交換しました。');
    }
}
