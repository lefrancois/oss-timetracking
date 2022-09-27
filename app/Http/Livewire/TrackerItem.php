<?php

namespace App\Http\Livewire;

use App\Http\Traits\DateHelpers;
use App\Models\Timer;
use Livewire\Component;

class TrackerItem extends Component
{
    use DateHelpers;

    protected $listeners = ['refreshTracker' => '$refresh'];

    public Timer $item;
    public String $time;

    public function render()
    {
        $this->time = $this->niceTimeDisplay($this->item->duration);
        return view('livewire.tracker-item');
    }
}
