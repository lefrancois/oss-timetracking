<div class="relative">
    @if ($compareTime)
        <div class="bg-cosu-900 pointer-events-none bg-opacity-5 absolute h-full transition-all duration-1000" style="width: {{ ($item->duration / $compareTime) * 100 }}%;"></div>
    @endif

    <div class="block transition group cursor-pointer {{ $item->deleted ? 'bg-red-50 dark:bg-red-800 dark:hover:bg-red-900 hover:bg-red-100 opacity-30 hover:opacity-100 dark:hover:opacity-50' : 'hover:bg-gray-50 dark:hover:bg-gray-800' }}" wire:click="openEditor">
        <div class="px-4 py-4 sm:px-6">
            <div class="flex items-center justify-between">
                @if ($item->title)
                    <p class="text-lg font-medium text-gray-600 dark:text-gray-200 truncate">
                        {{ $item->title }}
                    </p>
                @else
                    <p class="text-gray-300 dark:text-gray-700">
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
                        <i class="ri-time-line ri-lg mr-2"></i>
                        {!! $time !!}
                    </p>
                </div>
                <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:w-1/3">
                    <i class="ri-calendar-line ri-lg mr-2"></i>
                    <p class="">
                        <span class="font-semibold">{{ __('Started') }}: </span>
                        <time>{{ $item->start->format('d.m.Y H:i') }}</time>
                    </p>
                </div>
                <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:w-1/3">
                    <i class="ri-calendar-2-fill ri-lg mr-2"></i>
                    <p class="">
                        <span class="font-semibold">Stopped: </span>
                        <time>{{ $item->end->format('d.m.Y H:i') }}</time>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
