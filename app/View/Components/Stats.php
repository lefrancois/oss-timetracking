<?php

namespace App\View\Components;

use App\Http\Traits\DateHelpers;
use App\Models\Tracker as TrackerModel;
use Illuminate\View\Component;

class Stats extends Component
{

    use DateHelpers;

    public TrackerModel $tracker;
    public String $totalTime;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(TrackerModel $data)
    {
        $this->tracker = $data;
        $this->totalTime = $this->niceTimeDisplay($this->tracker->items->sum('duration'));
    }

    public function niceTime($seconds) {
        return 1;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.stats');
    }
}
