<div>
    @if ($tracker->items->count())
        <div class="flex justify-between items-center lg:space-x-4 flex-col lg:flex-row">
            <div class="mb-3 w-full text-black dark:text-gray-100">
                <div class="text-xs font-bold mb-1">
                    {{ __('Search') }}
                </div>
                <div class="flex text-black dark:text-gray-100">
                    <input type="text" wire:model.debounce="filterText" placeholder="{{ __('Title, note, ...') }}" class="h-8 shadow-sm dark:bg-gray-700 dark:border-0 w-full ml-0 items-center flex focus:ring-0 focus:border-0 block w-full sm:text-sm border-gray-300 rounded-l-md">
                    <button class="bg-cosu-700 dark:bg-cosu-800 text-white dark:text-gray-100 rounded-r-md px-3 text-xs whitespace-nowrap" wire:click="$set('filterText', null)">
                        {{ __('Reset filter') }}
                    </button>
                </div>
            </div>
            <div class="mb-3 w-full text-black dark:text-gray-100">
                <div class="text-xs font-bold mb-1">
                    {{ __('Date filter') }}
                </div>
                <div class="flex text-black dark:text-gray-100">
                    <input type="date" wire:model.debounce="filterDate" class="h-8 dark:bg-gray-700 dark:border-0 shadow-sm w-full ml-0 items-center flex focus:ring-0 focus:border-0 block w-full sm:text-sm border-gray-300 rounded-l-md">
                    <button class="bg-cosu-700 dark:text-gray-100 dark:bg-cosu-800 text-white rounded-r-md px-3 text-xs whitespace-nowrap" wire:click="$set('filterDate', null)">
                        {{ __('Reset filter') }}
                    </button>
                </div>
            </div>
            <div class="mb-3 w-full text-left lg:text-right">
                <div class="text-xs font-bold mb-1 text-black dark:text-gray-100">
                    {{ __('Filter deleted') }}
                </div>
                <div class="">
                    <input type="checkbox" wire:model.debounce="filterDeleted" class="appearance-none h-8 shadow-sm w-8 border-gray-300 checked:bg-cosu-700 checked:hover:bg-cosu-700 dark:border-0 checked:bg-cosu-800 checked:hover:bg-cosu-800 dark:bg-gray-800 rounded-md">
                </div>
            </div>
        </div>
    @endif

        <div class="bg-white dark:bg-gray-800 shadow overflow-hidden rounded-md">

            @if ($items->whereNotNull('end')->count())
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @php
                        $lastDate = '';
                    @endphp
                    @foreach($items->whereNotNull('end')->sortByDesc('start') as $timer)
                        @if ($lastDate != $timer->start->format('d.m.Y'))
                            <div class="text-xs py-1 px-3 text-center bg-cosu-700 text-white dark:text-gray-100">
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
                    <div class="text-center py-6 dark:text-gray-100">
                        {{ __('No timers found') }}
                    </div>
                </div>
            @endif

        </div>
</div>
