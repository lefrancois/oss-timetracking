<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Timer extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $guarded = ['id'];

    protected $casts = [
        'start' => 'datetime:Y-m-d\TH:i',
        'end' => 'datetime:Y-m-d\TH:i',
    ];

    public function tracker()
    {
        return $this->belongsTo(Tracker::class);
    }
}
