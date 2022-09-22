<div class="">
    <div class="grid gap-3 w-full">
        @php
            $lastDate = ''
        @endphp
        @foreach ($tracker->items->sortBy('start') as $item)
            @if ($item->start->format('d.m.Y') != $lastDate)
            <div class="border-t border-gray-400 mt-3 text-xs font-bold w-full flex items-center justify-center cursor-pointer" x-on:click="open = !open">
                <div class="mr-4 -mt-2 bg-white px-2">
                    {{  $item->start->format('d.m.Y') }}
                </div>
            </div>
            @endif
            @php
                $lastDate = $item->start->format('d.m.Y')
            @endphp
            <x-tracker-item :data="$item"></x-tracker-item>
        @endforeach
    </div>
</div>
