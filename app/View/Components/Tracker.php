<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Tracker as TrackerModel;

class Tracker extends Component
{
    public TrackerModel $tracker;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(TrackerModel $data)
    {
        $this->tracker = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tracker');
    }
}
