<div class="space-y-2">
    @foreach($tracker->items->whereNull('end') as $item)
        @livewire('running-timer', ['timer' => $item], key('running-timer-'.$item->id))
    @endforeach
</div>
