<div class="h-full flex flex-col">
    <header class="pb-4 lg:pb-20 bg-gradient-to-br from-cosu-500 to-cosu-700">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="relative flex items-center justify-center justify-between">
                <div class="top-1 left-0 py-6 flex-shrink-0 lg:top-0 lg:static">
                    <a href="/" class="">
                        <img src="{{ asset('svg/cosu_plain_white.svg') }}" class="h-12">
                    </a>
                </div>
                <div class="space-x-2">
                    <a href="https://discord.gg/ZDRk3YG4kY" target="_blank">
                        <i class="ri-discord-fill ri-2x text-white"></i>
                    </a>
                    <a href="https://github.com/cosu-io/timetracking" target="_blank">
                        <i class="ri-github-fill ri-2x text-white"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-1">
        <div class>
            <div class="-mt-14 lg:-mt-20 pb-8 h-full">
                @livewire('timer-edit', ['item' => $tracker->items->first() ?? new App\Models\Timer(), 'trackerId' => $tracker->id, key('edit-overlay')])
                <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                    <div class="hidden md:grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8" wire:key="desktop">
                        <div class="grid grid-cols-1 gap-4 lg:col-span-2">
                            @livewire('tracker-details', ['tracker' => $tracker], key('details-d-'.$tracker->id))
                            @livewire('stopped-timer-list', ['tracker' => $tracker], key('stopped-d-'.$tracker->id))
                        </div>
                        <div class="grid grid-cols-1 gap-4">
                            @livewire('stats', ['tracker' => $tracker], key('stats-d-'.$tracker->id))
                            @livewire('running-timer-list', ['tracker' => $tracker], key('running-d-'.$tracker->id))
                            <x-roadmap></x-roadmap>
                        </div>
                    </div>
                    <div class="grid md:hidden grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8" wire:key="mobile">
                        <div class="grid grid-cols-1 gap-4 lg:col-span-2">
                            @livewire('tracker-details', ['tracker' => $tracker], key('details-m-'.$tracker->id))
                            @livewire('stats', ['tracker' => $tracker], key('stats-m-'.$tracker->id))
                            @livewire('running-timer-list', ['tracker' => $tracker], key('running-m-'.$tracker->id))
                            @livewire('stopped-timer-list', ['tracker' => $tracker], key('stopped-m-'.$tracker->id))
                            <x-roadmap></x-roadmap>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <x-footer></x-footer>
</div>
