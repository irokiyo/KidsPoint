<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardLog extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'child_id',
            'reward_id',
            'rewarded_at',
            'quantity',
            'used_point',
        ];

    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }
    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
