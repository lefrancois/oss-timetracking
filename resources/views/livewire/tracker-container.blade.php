<div>
    <div class="min-h-screen">
        <div class="container shadow-lg bg-white min-h-screen p-2 lg:p-4 grid grid-cols-1 lg:grid-cols-2 mx-auto gap-16 flex-col">
            <div class="space-y-3">
                <div class="flex">
                    <button class="bg-cosu-800 text-white hover:bg-cosu-900 transition-colors p-2 rounded-l w-full flex-grow">
                        {{ __('Start timer') }}
                    </button>
                    <button class="bg-cosu-700 text-white transition-colors p-2 rounded-r w-16 flex-shrink" data-tippy-content="{{ __('Add manual timer') }}">
                        <i class="ri-edit-box-line p-1 text-white"></i>
                    </button>
                </div>
                @livewire('stats', ['tracker' => $tracker])
                @livewire('tracker', ['tracker' => $tracker])
            </div>
            <div>
                 @livewire('timer-edit')
            </div>
        </div>
    </div>
</div>
