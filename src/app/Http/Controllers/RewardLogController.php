<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RewardLogController extends Controller
{
    public function store(Request $request, Child $child)
    {
        $rewardIds = $request->input('rewards', []);
        foreach ($rewardIds as $rewardId) {
            RewardLog::create([
                'child_id' => $child->id,
                'reward_id' => $rewardId,
            ]);
        }
        return redirect()->route('home')->with('success', '交換しました。');
    }
}
