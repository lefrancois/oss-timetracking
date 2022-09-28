<div class="h-full flex flex-col">
    <header class="pb-28 lg:pb-20 bg-gradient-to-br from-cosu-500 to-cosu-700">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="relative flex flex-wrap items-center justify-center lg:justify-between">
                <div class="absolute top-1 left-0 py-6 flex-shrink-0 lg:top-0 lg:static">
                    <a href="/" class="">
                        <img src="{{ asset('svg/cosu_plain_white.svg') }}" class="h-12">
                    </a>
                </div>
                <div class="hidden lg:ml-4 lg:flex lg:items-center lg:py-5 lg:pr-0.5">
                    <div class="ml-4 relative flex-shrink-0">
                        <a href="https://github.com/cosu-io/timetracking" target="_blank">
                            <i class="ri-github-fill ri-2x text-white bg-black rounded-full bg-opacity-20 shadow"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-1">
        <div class>
            <div class="-mt-14 lg:-mt-20 pb-8 h-full">
                <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                    <div class="hidden md:grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8" wire:key="desktop">
                        <div class="grid grid-cols-1 gap-4 lg:col-span-2">
                            @livewire('tracker-details', ['tracker' => $tracker], key('details-d-'.$tracker->id))
                            @livewire('stopped-timer-list', ['tracker' => $tracker], key('stopped-d-'.$tracker->id))
                        </div>
                        <div class="grid grid-cols-1 gap-4">
                            @livewire('stats', ['tracker' => $tracker], key('stats-d-'.$tracker->id))
                            @livewire('running-timer-list', ['tracker' => $tracker], key('running-d-'.$tracker->id))
                        </div>
                    </div>
                    <div class="grid md:hidden grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8" wire:key="mobile">
                        <div class="grid grid-cols-1 gap-4 lg:col-span-2">
                            @livewire('tracker-details', ['tracker' => $tracker], key('details-m-'.$tracker->id))
                            @livewire('stats', ['tracker' => $tracker], key('stats-m-'.$tracker->id))
                            @livewire('running-timer-list', ['tracker' => $tracker], key('running-m-'.$tracker->id))
                            @livewire('stopped-timer-list', ['tracker' => $tracker], key('stopped-m-'.$tracker->id))
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
            <div class="border-t border-gray-200 py-8 text-sm text-gray-500 text-center sm:text-left">
                <div class="flex justify-center flex-col lg:flex items-center">
                    <div class="w-full text-center">
                        <span class="">&copy; {{ \Carbon\Carbon::now()->format('Y') }} COSU</span>
                        <span class=""> All rights reserved.</span>
                    </div>
                    <div class="w-full mt-4 flex justify-center">
                        <a class="block sm:inline hover:text-gray-700 mx-2" href="#" target="_blank">{{ __('Imprint') }}</a>
                        <a class="block sm:inline hover:text-gray-700 mx-2" href="#" target="_blank">{{ __('Data protection') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

{{--<div>--}}
{{--    <div class="min-h-screen">--}}
{{--        <div class="container shadow-lg bg-white min-h-screen p-2 lg:p-4 grid grid-cols-1 lg:grid-cols-2 mx-auto gap-16 flex-col">--}}
{{--            <div class="space-y-3">--}}
{{--                <div class="flex">--}}
{{--                    <button class="bg-cosu-800 text-white hover:bg-cosu-900 transition-colors p-2 rounded-l w-full flex-grow">--}}
{{--                        {{ __('Start timer') }}--}}
{{--                    </button>--}}
{{--                    <button class="bg-cosu-700 text-white transition-colors p-2 rounded-r w-16 flex-shrink" data-tippy-content="{{ __('Add manual timer') }}">--}}
{{--                        <i class="ri-edit-box-line p-1 text-white"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                @livewire('stats', ['tracker' => $tracker])--}}
{{--                @livewire('tracker', ['tracker' => $tracker])--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                 @livewire('timer-edit')--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
