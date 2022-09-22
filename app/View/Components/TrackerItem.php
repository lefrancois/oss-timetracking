<?php

namespace App\View\Components;

use App\Models\Timer;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\View\Component;

class TrackerItem extends Component
{
    public Timer $item;
    public String $time;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Timer $data)
    {
        $this->item = $data;
        $this->time = $this->niceTimeDisplay($this->item->duration);
    }

    private function niceTimeDisplay($seconds) {
        $days = sprintf("%02d", floor($seconds / (60 * 60 * 24)));
        $seconds -= $days * 60 * 60 * 24;
        $hours = sprintf("%02d", floor($seconds / (60 * 60)));
        $seconds -= $hours * 60 * 60;
        $minutes = sprintf("%02d", floor($seconds / 60));
        $seconds -= $minutes * 60;
        $seconds = sprintf("%02d", $seconds);
        return sprintf('<span class="%s">%s<sup class="text-gray-600">d</sup></span> <span class="%s">%s<sup class="text-gray-600">h</sup></span> <span class="%s">%s<sup class="text-gray-600">m</sup></span>',
            $days != '00' ? '' : 'text-gray-400',
            $days,
            $hours != '00' ? '' : 'text-gray-400',
            $hours,
            $minutes != '00' ? '' : 'text-gray-400',
            $minutes,
        );
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tracker-item');
    }
}
