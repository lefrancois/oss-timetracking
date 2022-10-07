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
    public String $firstStart;
    public String $lastEnd;

    public function mount()
    {
        $this->updateStats();
    }

    public function updateStats() {
        if ($this->tracker->items->whereNotNull('end')->count()) {
            $this->totalTime = $this->niceTimeDisplay($this->tracker->items->where('deleted', 0)->sum('duration'));
            $this->firstStart = $this->tracker->items->sortBy('start')->first()->start->format('d.m.Y H:i');
            $this->lastEnd = $this->tracker->items->sortByDesc('end')->first()->end->format('d.m.Y H:i');
        } else {
            $this->totalTime = '-';
            $this->firstStart = '-';
            $this->lastEnd = '-';
        }
    }

    public function render()
    {
        return view('livewire.stats');
    }
}
