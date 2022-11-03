<?php

namespace App\Http\Livewire;

use App\Models\Tracker as TrackerModel;
use Livewire\Component;

class Tracker extends Component
{
    public TrackerModel $tracker;

    protected $listeners = ['refreshTracker' => '$refresh'];

    public function render()
    {
        return view('livewire.tracker');
    }
}
