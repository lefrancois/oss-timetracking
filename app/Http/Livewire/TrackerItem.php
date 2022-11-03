<?php

namespace App\Http\Livewire;

use App\Http\Traits\DateHelpers;
use App\Models\Timer;
use Livewire\Component;

class TrackerItem extends Component
{
    use DateHelpers;

    public Timer $item;

    public String $time;
    public Int $compareTime;

    protected $listeners = ['refreshTracker' => '$refresh'];

    public function openEditor()
    {
        $this->emit('openEditor', $this->item);
    }

    public function render()
    {
        $this->time = $this->niceTimeDisplay($this->item->duration);
        $this->compareTime = $this->item->tracker->items->max('duration');
        return view('livewire.tracker-item');
    }
}
