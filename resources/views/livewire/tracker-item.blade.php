<div>
    <div class="block transition group cursor-pointer {{ $item->deleted ? 'bg-red-50 hover:bg-red-100 opacity-30 hover:opacity-100' : 'hover:bg-gray-50' }}" wire:click="openEditor">
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
                {!! $item->notes ?? '<span class="opacity-20">'. __('No notes yet, click to add one') . '</span>' !!}
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
</div>
