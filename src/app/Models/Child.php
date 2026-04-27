<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'user_id',
            'name',
            'birthday',
            'sex',
            'img_url',

        ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function taskRecords()
    {
        return $this->hasMany(TaskRecord::class);
    }
    public function rewardLogs()
    {
        return $this->hasMany(RewardLog::class);
    }
    public function totalDayPoint()
    {
        return $this->taskRecords()->whereDate('created_at', now())->sum('point');
    }
    public function totalPoint()
    {
        return $this->taskRecords()->sum('point');
    }
    public function totalUsedPoint()
    {
        return $this->rewardLogs()->sum('used_point');
    }

}
