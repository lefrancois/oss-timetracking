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
{{--            <div class="relative">--}}
{{--                <div @click="toggleExport = !toggleExport" class="bg-cyan-500 shadow p-2 w-32 text-center font-medium rounded-md cursor-pointer flex justify-center items-center hover:bg-cyan-600 text-white h-8">--}}
{{--                    <div class="">--}}
{{--                        Export as--}}
{{--                    </div>--}}
{{--                    <svg class="flex-shrink-0 h-5 w-5 ml-1 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <div v-if="toggleExport" class="bg-gray-200 shadow w-32 text-center text-sm font-medium rounded-md cursor-pointer justify-center items-center text-gray-600 absolute top-12">--}}
{{--                    <div @click="exportAs('xlsx')" class="p-2 hover:bg-gray-100">--}}
{{--                        XLSX--}}
{{--                    </div>--}}
{{--                    <div @click="exportAs('csv')" class="p-2 hover:bg-gray-100">--}}
{{--                        CSV--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        <div class="bg-white shadow overflow-hidden sm:rounded-md">

            @if ($items->count())
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
                    <div class="text-center text-xl font-medium py-6">
                        {{ __('No timers found') }}
{{--                        <div @click="resetFilter()" class="mt-4 mx-auto bg-cyan-500 shadow p-1 w-32 text-center text-base font-medium rounded-md cursor-pointer flex justify-center items-center hover:bg-cyan-600 text-gray-200">--}}
{{--                            <div class="">--}}
{{--                                Reset filter--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            @endif

        </div>
</div>
