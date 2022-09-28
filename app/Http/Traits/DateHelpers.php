<?php

namespace App\Http\Traits;

trait DateHelpers
{
    public function niceTimeDisplay($seconds) {
        $days = sprintf("%02d", floor($seconds / (60 * 60 * 24)));
        $seconds -= $days * 60 * 60 * 24;
        $hours = sprintf("%02d", floor($seconds / (60 * 60)));
        $seconds -= $hours * 60 * 60;
        $minutes = sprintf("%02d", floor($seconds / 60));
        $seconds -= $minutes * 60;
        $seconds = sprintf("%02d", $seconds);
        return sprintf('<span class="%s">%s<sup class="text-gray-600">d</sup></span><span class="%s">%s<sup class="text-gray-600">h</sup></span><span class="%s">%s<sup class="text-gray-600">m</sup></span>',
            $days != '00' ? '' : 'text-gray-400',
            $days,
            $hours != '00' ? '' : 'text-gray-400',
            $hours,
            $minutes != '00' ? '' : 'text-gray-400',
            $minutes,
        );
    }
}
