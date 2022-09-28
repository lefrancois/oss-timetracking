<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tracker as TrackerModel;

class StoppedTimerList extends Component
{
    public TrackerModel $tracker;

    protected $listeners = ['refreshTracker' => '$refresh'];

    public function render()
    {
        return view('livewire.stopped-timer-list');
    }
}
