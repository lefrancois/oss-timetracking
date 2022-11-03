<div>
    <div x-data x-cloak x-show="$wire.showDetails" :class="`fixed inset-0 overflow-hidden z-50 ${ $wire.showDetails ? 'pointer-events-auto' : 'pointer-events-none' }`">
        <div class="absolute inset-0 overflow-hidden">
            <div x-show="$wire.showDetails" x-transition.opacity.duration.500ms class="fixed inset-0 bg-gray-500 dark:bg-gray-900 bg-opacity-75 dark:bg-opacity-75 transition-all" aria-hidden="true" wire:click="closeTimerDetails"></div>
            <section x-show="$wire.showDetails"
                     x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                     x-transition:enter-start="translate-x-full"
                     x-transition:enter-end="translate-x-0"
                     x-transition:leave="transform transition-all ease-in-out duration-500 sm:duration-700"
                     x-transition:leave-start="translate-x-0"
                     x-transition:leave-end="translate-x-full"
                     class="absolute inset-y-0 right-0 pl-10 max-w-full flex" aria-labelledby="slide-over-heading">
                <div class="w-screen max-w-md">
                    <div class="h-screen flex flex-col py-6 bg-white dark:bg-gray-800 shadow-xl overflow-y-scroll">
                        <div class="px-4 sm:px-6">
                            <div class="flex items-start justify-between">
                                <h2 id="slide-over-heading" class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Timer details') }}
                                </h2>
                                <div class="ml-3 h-7 flex items-center pointer-events-auto" wire:click="closeTimerDetails">
                                    <button class="bg-white dark:bg-gray-700 rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cosu-500">
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
                            <div class="border-b border-gray-200 dark:border-gray-700">
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
                                                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-100">{{ __('Title') }}</label>
                                                <span class="text-sm text-gray-500" id="email-optional">{{ __('Optional') }}</span>
                                            </div>
                                            <div class="mt-1">
                                                <input id="title" wire:keydown.enter="updateTimer" type="text" name="title" class="shadow-sm focus:ring-cosu-500 dark:focus:ring-opacity-0 dark:focus:border-opacity-0 dark:bg-gray-700 dark:border-opacity-0 dark:text-gray-100 focus:border-cosu-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="{{ __('Title') }}" wire:model.defer="item.title">
                                                @error('item.title')
                                                <div class="text-xs text-red-700 mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <div class="flex justify-between">
                                                <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-100">{{ __('Notes') }}</label>
                                                <span class="text-sm text-gray-500" id="email-optional">{{ __('Optional') }}</span>
                                            </div>
                                            <div class="mt-1">
                                                <textarea id="notes" type="text" name="notes" class="shadow-sm focus:ring-cosu-500 focus:border-cosu-500 dark:focus:ring-opacity-0 dark:focus:border-opacity-0 dark:bg-gray-700 dark:border-opacity-0 dark:text-gray-100 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="{{ __('Notes') }}" wire:model.defer="item.notes" rows="5"></textarea>
                                                @error('item.notes')
                                                <div class="text-xs text-red-700 mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <div class="flex justify-between">
                                                <label for="start" class="block text-sm font-medium text-gray-700 dark:text-gray-100">{{ __('Start date') }}</label>
                                            </div>
                                            <div class="mt-1">
                                                <input id="start" wire:keydown.enter="updateTimer" type="datetime-local" name="start" class="dark:focus:ring-opacity-0 dark:focus:border-opacity-0 dark:bg-gray-700 dark:border-opacity-0 dark:text-gray-100 shadow-sm focus:ring-cosu-500 focus:border-cosu-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model.defer="item.start">
                                                @error('item.start')
                                                <div class="text-xs text-red-700 mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <div class="flex justify-between">
                                                <label for="end" class="block text-sm font-medium text-gray-700 dark:text-gray-100">{{ __('End date') }}</label>
                                            </div>
                                            <div class="mt-1">
                                                <input id="end" wire:keydown.enter="updateTimer" type="datetime-local" name="end" class="dark:focus:ring-opacity-0 dark:focus:border-opacity-0 dark:bg-gray-700 dark:border-opacity-0 dark:text-gray-100 shadow-sm focus:ring-cosu-500 focus:border-cosu-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model.defer="item.end">
                                                @error('item.end')
                                                <div class="text-xs text-red-700 mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <button wire:click="updateTimer" class="mt-4 block w-full justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-cosu-600 hover:bg-cosu-700 dark:text-gray-100 dark:bg-cosu-700 dark:hover:bg-cosu-800 transition duration-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cosu-500">
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
                                                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200 dark:bg-gray-600"></span>
                                                            <div class="relative flex space-x-3 items-center">
                                                                <div>
                                                                    <span class="h-8 w-8 rounded-full bg-red-400 flex items-center justify-center ring-8 ring-white dark:ring-opacity-0">
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
                                                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200 dark:bg-gray-600"></span>
                                                                <div class="relative flex space-x-3 items-center">
                                                                    <div>
                                                                        <span class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white dark:ring-opacity-0">
                                                                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                    <div class="min-w-0 flex-1 flex justify-between space-x-4">
                                                                        <div>
                                                                            @foreach ($audit->new_values as $key => $value)
                                                                                @if (in_array($key, ['start', 'end']))
                                                                                    <p class="text-sm text-gray-700 dark:text-gray-400">
                                                                                        <span class="capitalize font-bold">{{ $key }}:</span> {{ \Carbon\Carbon::parse($value)->format('d.m.Y H:i') }}
                                                                                    </p>
                                                                                @elseif (!in_array($key, ['tracker_id','id','edited','deleted','duration','manual']))
                                                                                    <p class="text-sm text-gray-700 dark:text-gray-400">
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
                                                        <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200 dark:bg-gray-600"></span>
                                                        <div class="relative flex space-x-3 items-center">
                                                            <div>
                                                                <span class="h-8 w-8 rounded-full bg-gray-800 dark:bg-gray-600 flex items-center justify-center ring-8 ring-white dark:ring-opacity-0">
                                                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"></path>
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div class="min-w-0 flex-1 flex justify-between space-x-4">
                                                                <div>
                                                                    <p class="text-sm text-gray-500 dark:text-gray-400 font-light">
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
                                                                <span class="h-8 w-8 rounded-full bg-green-400 flex items-center justify-center ring-8 ring-white dark:ring-opacity-0">
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
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if ($detailsOpenedTab == 'actions')
                                <div class="mt-12">
                                    <div class="bg-white dark:bg-gray-700 shadow sm:rounded-lg">
                                        <div class="px-4 py-5 sm:p-6">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">
                                                {{ __('Delete timer') }}
                                            </h3>
                                            <div class="mt-2 max-w-xl text-sm text-gray-500 dark:text-gray-400">
                                                <p>
                                                    {{ __('Deletion will not complety remove this timer. The last status and history will be visible.') }}
                                                </p>
                                            </div>
                                            <div class="mt-5">
                                                <button wire:click="deleteTimer" type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 dark:bg-red-300 dark:hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm">
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
            </section>
        </div>
    </div>
</div>
