<div>
    @if ($tracker->items->count())
        <div class="flex justify-between items-center space-x-4">
            <div class="mb-3 w-full">
                <div class="text-xs font-bold mb-1">
                    {{ __('Search for ...') }}
                </div>
                <div class="flex">
                    <input type="text" wire:model.debounce="filterText" placeholder="{{ __('Searchstring') }}" class="h-10 shadow-sm w-full ml-0 items-center flex focus:ring-cosu-500 focus:border-cosu-500 block w-full sm:text-sm border-gray-300 rounded-l-md">
                    <button class="bg-cosu-700 text-white rounded-r-md px-3 text-xs whitespace-nowrap" wire:click="$set('filterText', null)">
                        {{ __('Reset filter') }}
                    </button>
                </div>
            </div>
            <div class="mb-3 w-full">
                <div class="text-xs font-bold mb-1">
                    {{ __('Date filter') }}
                </div>
                <div class="flex">
                    <input type="date" wire:model.debounce="filterDate" class="h-10 shadow-sm w-full ml-0 items-center flex focus:ring-cosu-500 focus:border-cosu-500 block w-full sm:text-sm border-gray-300 rounded-l-md">
                    <button class="bg-cosu-700 text-white rounded-r-md px-3 text-xs whitespace-nowrap" wire:click="$set('filterDate', null)">
                        {{ __('Reset filter') }}
                    </button>
                </div>
            </div>
            <div class="mb-3 w-full text-right">
                <div class="text-xs font-bold mb-1">
                    {{ __('Filter deleted') }}
                </div>
                <div class="">
                    <input type="checkbox" wire:model.debounce="filterDeleted" class="appearance-none h-10 shadow-sm w-10 border-gray-300 checked:bg-cosu-700 checked:hover:bg-cosu-700 rounded-md">
                </div>
            </div>
        </div>
    @endif

        <div class="bg-white shadow overflow-hidden sm:rounded-md">

            @if ($items->whereNotNull('end')->count())
                <ul class="divide-y divide-gray-200">
                    @php
                        $lastDate = '';
                    @endphp
                    @foreach($items->whereNotNull('end')->sortByDesc('start') as $timer)
                        @if ($lastDate != $timer->start->format('d.m.Y'))
                            <div class="text-xs py-1 px-3 text-center bg-cosu-700 text-white">
                                {{ $timer->start->format('d.m.Y') }}
                            </div>
                        @endif
                        <li wire:key="timer-{{ $timer->id }}">
                            @livewire('tracker-item', ['item' => $timer], key($timer->id))
                        </li>
                        @php
                            $lastDate = $timer->start->format('d.m.Y');
                        @endphp
                    @endforeach
                </ul>
            @else
                <div class="" v-if="filteredTimers.length == 0 && selectedDate != undefined">
                    <div class="text-center py-6">
                        {{ __('No timers found') }}
                    </div>
                </div>
            @endif

        </div>
</div>
