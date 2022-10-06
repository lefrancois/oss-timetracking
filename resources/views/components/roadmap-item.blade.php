@props([
    'icon' => 'add',
    'end' => false,
    'color' => 'blue'
])
<li>
    <div class="relative pb-8">
        @if (!$end)
            <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
        @endif
        <div class="relative flex items-start space-x-3">
            <div>
                <div class="relative px-1">
                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 ring-8 ring-white">
                        <i class="ri-{{ $icon }}-fill text-cosu-600"></i>
                    </div>
                </div>
            </div>
            <div class="min-w-0 flex-1 py-0">
                <div class="text-sm leading-8 text-gray-500">
                                    <span class="mr-0.5">
                                        <a href="#" class="relative inline-flex items-center rounded-full border border-gray-300 px-3 py-0.5 text-sm">
                                          <span class="absolute flex flex-shrink-0 items-center justify-center">
                                              <span class="hidden bg-red-500 bg-yellow-500 bg-blue-500"></span>
                                              <span class="h-1.5 w-1.5 rounded-full bg-{{ $color }}-500" aria-hidden="true"></span>
                                          </span>
                                          <span class="ml-3.5 font-medium text-gray-900">
                                              {{ $slot }}
                                          </span>
                                        </a>
                                    </span>
                </div>
            </div>
        </div>
    </div>
</li>
