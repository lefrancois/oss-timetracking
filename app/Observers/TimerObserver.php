<?php

namespace App\Observers;

use App\Models\Timer;
use Carbon\Carbon;

class TimerObserver
{
    /**
     * Handle the Timer "saving" event.
     *
     * @param  \App\Models\Timer  $timer
     * @return void
     */
    public function saving(Timer $timer) {
        $timer->duration = $timer->start->diffInSeconds($timer->end);
    }

    /**
     * Handle the Timer "created" event.
     *
     * @param  \App\Models\Timer  $timer
     * @return void
     */
    public function created(Timer $timer)
    {
        //
    }

    /**
     * Handle the Timer "updated" event.
     *
     * @param  \App\Models\Timer  $timer
     * @return void
     */
    public function updated(Timer $timer)
    {
        //
    }

    /**
     * Handle the Timer "deleted" event.
     *
     * @param  \App\Models\Timer  $timer
     * @return void
     */
    public function deleted(Timer $timer)
    {
        //
    }

    /**
     * Handle the Timer "restored" event.
     *
     * @param  \App\Models\Timer  $timer
     * @return void
     */
    public function restored(Timer $timer)
    {
        //
    }

    /**
     * Handle the Timer "force deleted" event.
     *
     * @param  \App\Models\Timer  $timer
     * @return void
     */
    public function forceDeleted(Timer $timer)
    {
        //
    }
}
