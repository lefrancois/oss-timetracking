<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Tracker as TrackerModel;

class StoppedTimerList extends Component
{
    public TrackerModel $tracker;
    public $filterDate;
    public $filterText;
    public Bool $filterDeleted = false;
    public $items;

    protected $listeners = ['refreshTracker' => '$refresh'];

    public function filter() {
        $this->items = $this->tracker->items;
        if ($this->filterDate) {
            $this->items = $this->items->whereBetween('start', [Carbon::parse($this->filterDate)->startOfDay(), Carbon::parse($this->filterDate)->endOfDay()]);
        }
        if ($this->filterDeleted) {
            $this->items = $this->items->where('deleted', false);
        }
        if ($this->filterText) {
            $this->items = $this->items->filter(function ($i) {
                return Str::contains($i->title, $this->filterText) || Str::contains($i->notes, $this->filterText);
            });
        }
    }

    public function render()
    {
        $this->filter();
        return view('livewire.stopped-timer-list');
    }
}
