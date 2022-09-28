<?php

namespace App\Http\Livewire;

use App\Models\Tracker as TrackerModel;
use Livewire\Component;

class RunningTimerList extends Component
{
    public TrackerModel $tracker;

    protected $listeners = ['refreshTracker' => '$refresh'];

    public function render()
    {
        return view('livewire.running-timer-list');
    }
}
