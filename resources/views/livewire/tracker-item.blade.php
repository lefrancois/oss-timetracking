<div>
    <div class="block transition group cursor-pointer {{ $item->deleted ? 'bg-red-50 hover:bg-red-100 opacity-30 hover:opacity-100' : 'hover:bg-gray-50' }}" wire:click="$set('showDetails', 'true')">
        <div class="px-4 py-4 sm:px-6">
            <div class="flex items-center justify-between">
                @if ($item->title)
                    <p class="text-lg font-medium text-gray-600 truncate">
                        {{ $item->title }}
                    </p>
                @else
                    <p class="text-gray-300" v-if="!description">
                        {{ __('No title') }}
                    </p>
                @endif
                <div class="ml-2 flex-shrink-0 flex space-x-2">
                    @if ($item->manual)
                        <p class="px-2 inline-flex text-xs leading-5 font-light rounded-full bg-cosu-200 text-black">
                            {{ __('added manually') }}
                        </p>
                    @endif
                    @if ($item->edited)
                        <p class="px-2 inline-flex text-xs leading-5 font-light rounded-full bg-cosu-600 text-white">
                            {{ __('edited') }}
                        </p>
                    @endif
                    @if ($item->deleted)
                        <p class="px-2 inline-flex text-xs leading-5 font-light rounded-full bg-red-200 text-red-600">
                            {{ __('deleted') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="my-1 overflow-hidden h-0 line-clamp-2 group-hover:h-10 text-gray-400 text-sm transition-all duration-500 pr-32">
                {{ $item->notes }}
            </div>
            <div class="mt-2 sm:flex sm:justify-between">
                <div class="sm:flex sm:w-1/3">
                    <p class="flex items-center text-sm text-gray-500">
                        <!-- Heroicon name: users -->
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {!! $time !!}
                    </p>
                </div>
                <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:w-1/3">
                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                    <p class="">
                        <span class="font-semibold">{{ __('Started') }}: </span>
                        <time>{{ $item->start->format('d.m.Y H:i') }}</time>
                    </p>
                </div>
                <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:w-1/3">
                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                    <p class="">
                        <span class="font-semibold">Stopped: </span>
                        <time>{{ $item->end->format('d.m.Y H:i') }}</time>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 overflow-hidden z-50 {{ $showDetails ? 'pointer-events-auto' : 'pointer-events-none' }}" wire:key="modal-{{ $item->id }}">
        <div class="absolute inset-0 overflow-hidden ">
            @if ($showDetails)
                <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-all" aria-hidden="true" wire:click="closeTimerDetails"></div>
            @endif
            <section class="absolute inset-y-0 right-0 pl-10 max-w-full flex" aria-labelledby="slide-over-heading">
                @if ($showDetails)
                    <div class="w-screen max-w-md">
                        <div class="h-screen flex flex-col py-6 bg-white shadow-xl overflow-y-scroll">
                            <div class="px-4 sm:px-6">
                                <div class="flex items-start justify-between">
                                    <h2 id="slide-over-heading" class="text-lg font-medium text-gray-900">
                                        {{ __('Timer details') }}
                                    </h2>
                                    <div class="ml-3 h-7 flex items-center pointer-events-auto" wire:click="closeTimerDetails">
                                        <button class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cosu-500">
                                            <span class="sr-only">
                                                {{ __('Close panel') }}
                                            </span>
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 relative flex-1 px-4 sm:px-6">
                                <div class="border-b border-gray-200">
                                    <div class="px-6">
                                        <nav class="-mb-px flex space-x-6">
                                            @if (!$item->deleted)
                                                <a
                                                    href="#"
                                                    class="border-transparent whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm {{ $detailsOpenedTab === 'edit' ? 'border-cyan-500 text-cyan-600 hover:border-cyan-500' : 'text-gray-400 hover:border-gray-200' }}"
                                                    wire:click="$set('detailsOpenedTab', 'edit')"
                                                    v-if="timer.status !== 'deleted'">
                                                    {{ __('Edit') }}
                                                </a>
                                            @endif
                                            <a
                                                href="#"
                                                class="border-transparent whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm hover:border-gray-200 {{ $detailsOpenedTab === 'history' ? 'border-cyan-500 text-cyan-600 hover:border-cyan-500' : 'text-gray-400 hover:border-gray-200' }}"
                                                wire:click="$set('detailsOpenedTab', 'history')">
                                                {{ __('History') }}
                                            </a>
                                            @if (!$item->deleted)
                                                <a
                                                    href="#"
                                                    class="border-transparent whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm hover:border-gray-200 {{ $detailsOpenedTab === 'actions' ? 'border-cyan-500 text-cyan-600 hover:border-cyan-500' : 'text-gray-400 hover:border-gray-200' }}"
                                                    wire:click="$set('detailsOpenedTab', 'actions')"
                                                    v-if="timer.status !== 'deleted'">
                                                    Actions
                                                </a>
                                            @endif
                                        </nav>
                                    </div>
                                </div>
                                @if ($detailsOpenedTab == 'edit')
                                    <div class="mt-4">
                                        <div class="space-y-4">
                                            <div>
                                                <div class="flex justify-between">
                                                    <label for="title" class="block text-sm font-medium text-gray-700">{{ __('Title') }}</label>
                                                    <span class="text-sm text-gray-500" id="email-optional">{{ __('Optional') }}</span>
                                                </div>
                                                <div class="mt-1">
                                                    <input id="title" wire:keydown.enter="updateTimer" type="text" name="title" class="shadow-sm focus:ring-cosu-500 focus:border-cosu-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="{{ __('Title') }}" wire:model.defer="item.title">
                                                    @error('item.title')
                                                        <div class="text-xs text-red-700 mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div>
                                                <div class="flex justify-between">
                                                    <label for="notes" class="block text-sm font-medium text-gray-700">{{ __('Notes') }}</label>
                                                    <span class="text-sm text-gray-500" id="email-optional">{{ __('Optional') }}</span>
                                                </div>
                                                <div class="mt-1">
                                                    <textarea id="notes" wire:keydown.enter="updateTimer" type="text" name="notes" class="shadow-sm focus:ring-cosu-500 focus:border-cosu-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="{{ __('Notes') }}" wire:model.defer="item.notes" rows="5"></textarea>
                                                    @error('item.notes')
                                                        <div class="text-xs text-red-700 mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div>
                                                <div class="flex justify-between">
                                                    <label for="start" class="block text-sm font-medium text-gray-700">{{ __('Start date') }}</label>
                                                </div>
                                                <div class="mt-1">
                                                    <input id="start" wire:keydown.enter="updateTimer" type="datetime-local" name="start" class="shadow-sm focus:ring-cosu-500 focus:border-cosu-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model.defer="item.start">
                                                    @error('item.start')
                                                        <div class="text-xs text-red-700 mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div>
                                                <div class="flex justify-between">
                                                    <label for="end" class="block text-sm font-medium text-gray-700">{{ __('End date') }}</label>
                                                </div>
                                                <div class="mt-1">
                                                    <input id="end" wire:keydown.enter="updateTimer" type="datetime-local" name="end" class="shadow-sm focus:ring-cosu-500 focus:border-cosu-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model.defer="item.end">
                                                    @error('item.end')
                                                        <div class="text-xs text-red-700 mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <button wire:click="updateTimer" class="mt-4 block w-full justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cosu-500">
                                                {{ __('Save') }}
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                @if ($detailsOpenedTab == 'history')
                                    <div class="mt-12">
                                        <div class="flow-root">
                                            @if ($item->audits->count())
                                                <ul class="-mb-8">
                                                    @if ($item->deleted)
                                                        <li>
                                                            <div class="relative pb-8">
                                                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"></span>
                                                                <div class="relative flex space-x-3 items-center">
                                                                    <div>
                                                                    <span class="h-8 w-8 rounded-full bg-red-400 flex items-center justify-center ring-8 ring-white">
                                                                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                                        </svg>
                                                                    </span>
                                                                    </div>
                                                                    <div class="min-w-0 flex-1 flex justify-between space-x-4">
                                                                        <div>
                                                                            <p class="text-sm text-red-400 font-light">
                                                                                {{ __('Timer deleted') }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="text-right text-sm whitespace-nowrap text-gray-400">
                                                                            <time datetime="2020-09-20">{{ $item->updated_at->format('d.m.Y H:i') }}</time>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endif
                                                    @foreach($item->audits->sortByDesc('created_at') as $audit)
                                                        @if (!key_exists('deleted', $audit->new_values))
                                                            <li v-for="child in timerChildren" wire:key="audit-{{ $item->id }}-{{ $audit->id }}">
                                                                <div class="relative pb-8">
                                                                    <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"></span>
                                                                    <div class="relative flex space-x-3 items-center">
                                                                        <div>
                                                                        <span class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
                                                                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                                                            </svg>
                                                                        </span>
                                                                        </div>
                                                                        <div class="min-w-0 flex-1 flex justify-between space-x-4">
                                                                            <div>
                                                                                @foreach ($audit->new_values as $key => $value)
                                                                                    @if (in_array($key, ['start', 'end']))
                                                                                        <p class="text-sm text-gray-700">
                                                                                            <span class="capitalize font-bold">{{ $key }}:</span> {{ \Carbon\Carbon::parse($value)->format('d.m.Y H:i') }}
                                                                                        </p>
                                                                                    @elseif (!in_array($key, ['tracker_id','id','edited','deleted','duration','manual']))
                                                                                        <p class="text-sm text-gray-700">
                                                                                            <span class="capitalize font-bold">{{ $key }}:</span> {{ $value }}
                                                                                        </p>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                            <div class="text-right text-sm whitespace-nowrap text-gray-400">
                                                                                {{ $audit->created_at->format('d.m.Y H:i') }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                    <li>
                                                        <div class="relative pb-8">
                                                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"></span>
                                                            <div class="relative flex space-x-3 items-center">
                                                                <div>
                                                                <span class="h-8 w-8 rounded-full bg-gray-800 flex items-center justify-center ring-8 ring-white">
                                                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"></path>
                                                                    </svg>
                                                                </span>
                                                                </div>
                                                                <div class="min-w-0 flex-1 flex justify-between space-x-4">
                                                                    <div>
                                                                        <p class="text-sm text-gray-500 font-light">
                                                                            {{ __('Timer stopped') }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="text-right text-sm whitespace-nowrap text-gray-400">
                                                                        {{ $item->end->format('d.m.Y H:i') }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="relative pb-8">
                                                            <div class="relative flex space-x-3 items-center">
                                                                <div>
                                                                <span class="h-8 w-8 rounded-full bg-green-400 flex items-center justify-center ring-8 ring-white">
                                                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                                    </svg>
                                                                </span>
                                                                </div>
                                                                <div class="min-w-0 flex-1 flex justify-between space-x-4">
                                                                    <div>
                                                                        <p class="text-sm text-green-400 font-light">
                                                                            @if ($item->manual)
                                                                                <span>{{ __('Timer created (manually)') }}</span>
                                                                            @else
                                                                                <span>{{ __('Timer created') }}</span>
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                    <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                                        {{ $item->start->format('d.m.Y H:i') }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            @else
                                                <ul class="-mb-8">
                                                    <li v-if="timer.status === 'deleted'">
                                                        <div class="relative pb-8">
                                                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"></span>
                                                            <div class="relative flex space-x-3">
                                                                <div>
                                                                <span class="h-8 w-8 rounded-full bg-red-400 flex items-center justify-center ring-8 ring-white">
                                                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                                    </svg>
                                                                </span>
                                                                </div>
                                                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                                    <div>
                                                                        <p class="text-sm text-red-400 font-light">
                                                                            Timer deleted
                                                                        </p>
                                                                        <p class="text-sm text-gray-500">{{ formatDate(timer.deleted, 'full') }}</p>
                                                                    </div>
                                                                    <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                                        <time datetime="2020-09-20">{{ formatDate(timer.deleted, 'nice') }}</time>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="relative pb-8">
                                                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"></span>
                                                            <div class="relative flex space-x-3">
                                                                <div>
                                                                <span class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
                                                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"></path>
                                                                    </svg>
                                                                </span>
                                                                </div>
                                                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                                    <div>
                                                                        <p class="text-sm text-gray-500 font-light">
                                                                            Timer stopped
                                                                        </p>
                                                                        <p class="text-sm text-gray-500">{{ formatDate(timer.stopped, 'full') }}</p>
                                                                    </div>
                                                                    <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                                        <time datetime="2020-09-20">{{ formatDate(timer.stopped, 'nice') }}</time>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="relative pb-8">
                                                            <div class="relative flex space-x-3">
                                                                <div>
                                                                <span class="h-8 w-8 rounded-full bg-green-400 flex items-center justify-center ring-8 ring-white">
                                                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                                    </svg>
                                                                </span>
                                                                </div>
                                                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                                    <div>
                                                                        <p class="text-sm text-green-400 font-light">
                                                                            Timer created
                                                                        </p>
                                                                        <p class="text-sm text-gray-500">{{ formatDate(timer.created_at, 'full') }}</p>
                                                                    </div>
                                                                    <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                                        <time datetime="2020-09-20">{{ formatDate(timer.created_at, 'nice') }}</time>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                @if ($detailsOpenedTab == 'actions')
                                    <div class="mt-12">
                                        <div class="bg-white shadow sm:rounded-lg">
                                            <div class="px-4 py-5 sm:p-6">
                                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                    {{ __('Delete timer') }}
                                                </h3>
                                                <div class="mt-2 max-w-xl text-sm text-gray-500">
                                                    <p>
                                                        {{ __('Deletion will not complety remove this timer. The last status and history will be visible.') }}
                                                    </p>
                                                </div>
                                                <div class="mt-5">
                                                    <button wire:click="deleteTimer" type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm">
                                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                                        </svg>
                                                        {{ __('Delete timer') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </section>
        </div>
    </div>
</div>
