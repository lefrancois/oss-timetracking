<?php

namespace App\Http\Livewire;

use App\Http\Traits\DateHelpers;
use App\Models\Tracker as TrackerModel;
use Livewire\Component;

class Stats extends Component
{
    use DateHelpers;

    protected $listeners = ['updateStats'];

    public TrackerModel $tracker;
    public String $totalTime;

    public function mount()
    {
        $this->updateStats();
    }

    public function updateStats() {
        $this->totalTime = $this->niceTimeDisplay($this->tracker->items->where('deleted', 0)->sum('duration'));
    }

    public function render()
    {
        return view('livewire.stats');
    }
}
