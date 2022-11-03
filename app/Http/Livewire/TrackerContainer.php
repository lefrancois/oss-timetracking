<?php

namespace App\Http\Livewire;

use App\Models\Tracker;
use Livewire\Component;

class TrackerContainer extends Component
{
    public String $identifier;

    public Tracker $tracker;

    protected $listeners = ['refreshTracker' => '$refresh'];

    public function mount(string $identifier)
    {
        $this->identifier = $identifier;
        $this->tracker = Tracker::where('identifier', $this->identifier)->first();
    }

    public function render()
    {
        return view('livewire.tracker-container');
    }
}
