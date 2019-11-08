<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'leave_start_day', 'leave_end_day', 'reason','status', 'duration_days'
    ];
    protected $with = ['user', 'approvedBy'];
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
