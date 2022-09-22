<div class="">
    <div class="grid gap-3 w-full">
        @php
            $lastDate = ''
        @endphp
        @foreach ($tracker->items->where('deleted', '===', 0)->sortBy('start') as $item)
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
        <div class="grid gap-3 w-full" x-data="{ open: false }">
            <div class="border-t border-gray-400 mt-3 w-full flex items-center justify-center cursor-pointer" x-on:click="open = !open">
                <div class="-mt-3.5 bg-white px-2 flex justify-center items-center">
                    {{ __('Deleted timers') }}
                    <i class="ri-arrow-up-s-fill ri-lg text-black" x-show="!open"></i>
                    <i class="ri-arrow-down-s-fill ri-lg text-black" x-show="open"></i>
                </div>
            </div>
            <div class="grid gap-3 w-full" x-show="open" x-transition.duration.500ms>
                @foreach ($tracker->items->where('deleted', '===', 1) as $item)
                    <x-tracker-item :data="$item"></x-tracker-item>
                @endforeach
            </div>
        </div>
    </div>
</div>
