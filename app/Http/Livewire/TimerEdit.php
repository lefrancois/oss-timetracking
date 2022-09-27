<?php

namespace App\Http\Livewire;

use App\Models\Timer;
use Livewire\Component;

class TimerEdit extends Component
{
    public Timer $timer;

    protected $listeners = ['loadTimer'];
    protected $rules = [
      'timer.title' => 'required|string|max:250',
      'timer.notes' => 'nullable|string|max:1000',
      'timer.start' => 'required|date|before:timer.end',
      'timer.end' => 'required|date|after:timer.start',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function loadTimer(Timer $timer) {
        $this->timer = $timer;
    }

    public function submit() {
        $this->validate();
        $this->timer->edited = true;
        $this->timer->save();
        $this->timer = new Timer();
        $this->emit('refreshTracker');
        $this->emit('updateStats');
    }

    public function render()
    {
        return view('livewire.timer-edit');
    }
}
