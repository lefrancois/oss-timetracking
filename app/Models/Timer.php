<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['start', 'end'];

    public function tracker() {
        return $this->belongsTo(Tracker::class);
    }
}
