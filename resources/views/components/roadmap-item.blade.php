@props([
    'icon' => 'add',
    'end' => false,
    'color' => 'blue',
    'done' => false,
])
<li>
    <div class="relative pb-8">
        @if (!$end)
            <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200 dark:bg-gray-800" aria-hidden="true"></span>
        @endif
        <div class="relative flex items-start space-x-3">
            <div>
                <div class="relative px-1">
                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700 ring-8 ring-white dark:ring-gray-600">
                        <i class="ri-{{ $icon }}-fill text-cosu-600"></i>
                    </div>
                </div>
            </div>
            <div class="min-w-0 flex-1 py-0">
                <div class="text-sm leading-8 text-gray-500">
                    <span class="mr-0.5">
                        <a href="#" class="relative inline-flex items-center rounded-full border border-gray-300 dark:border-gray-600 px-3 py-0.5 text-sm {{ $done ? 'bg-cosu-500 dark:bg-cosu-700 text-white' : '' }}">
                            <span class="font-medium">
                                {{ $slot }}
                            </span>
                            @if ($done)
                                <span class="flex flex-shrink-0 items-center justify-center ml-2">
                                    <i class="ri-check-fill text-white"></i>
                              </span>
                            @endif
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</li>
