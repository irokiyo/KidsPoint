<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskRecord extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'child_id',
            'task_id',
            'recorded_at',
            'comment',
            'point'
        ];

    public function child()
        {
            return $this->belongsTo(Child::class);
        }
    public function task()
        {
            return $this->belongsTo(Task::class);
        }
}
