<?php

namespace App\Http\Livewire;

use App\Models\Timer;
use Carbon\Carbon;
use Livewire\Component;

class RunningTimer extends Component
{

    public Bool $editTitle = false;
    public Timer $timer;

    protected $rules = [
        'timer.title' => 'nullable|string|max:250',
    ];

    protected $listeners = ['refreshTracker' => '$refresh'];

    public function stopTimer() {
        $this->timer->update([
            'end' => Carbon::now(),
        ]);
        $this->emit('refreshTracker');
        $this->emit('updateStats');
    }

    public function setTitle(Int $id) {
        $this->timer->save();
        $this->editTitle = false;
    }

    public function render()
    {
        return view('livewire.running-timer');
    }
}
