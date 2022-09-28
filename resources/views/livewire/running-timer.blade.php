<div class="flex">
    <div wire:click="stopTimer" class="flex-shrink-0 flex items-center justify-center w-16 bg-red-400 hover:bg-red-500 text-white text-sm font-medium rounded-l-md cursor-pointer duration-300 ease-in-out">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"></path>
        </svg>
    </div>
    <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md ">
        @if ($editTitle)
            <div class="flex-1 px-4 py-2 text-sm truncate">
                <input wire:keydown.enter="setTitle({{ $timer->id }})" type="text" name="title" id="title" autofocus class="shadow-sm focus:ring-cyan-500 focus:border-cyan-500 block w-full sm:text-sm border-gray-300 rounded-md h-8 block" placeholder="Title" wire:model.defer="timer.title">
                <p class="text-gray-500 mt-0.5">
                    {!! $this->counter !!}
                </p>
            </div>
        @else
            <div class="flex-1 px-4 py-2 text-sm cursor-pointer truncate" wire:click="$set('editTitle', 'true')" wire:key="active-timer-edit-{{ $timer->id }}">
                @if ($timer->title)
                    <a class="text-gray-900 font-medium hover:text-gray-600 h-8 block flex items-center">
                        {{ $timer->title }}
                    </a>
                @else
                    <a class="text-gray-400 font-medium hover:text-gray-600 h-8 block flex items-center">
                        {{ __('No description') }}
                    </a>
                @endif
                <p class="text-gray-500 mt-0.5" x-data="{
                    output: '',
                    niceDuration() {
                        const timeInput = Math.floor(dayjs().diff(dayjs('{{ $timer->start }}')) / 1000)
                        const days = dayjs.duration(timeInput * 1000).days() >= 10 ? dayjs.duration(timeInput * 1000).days() : '0' + dayjs.duration(timeInput * 1000).days()
                        const hours = dayjs.duration(timeInput * 1000).hours() >= 10 ? dayjs.duration(timeInput * 1000).hours() : '0' + dayjs.duration(timeInput * 1000).hours()
                        const minutes = dayjs.duration(timeInput * 1000).minutes() >= 10 ? dayjs.duration(timeInput * 1000).minutes() : '0' + dayjs.duration(timeInput * 1000).minutes()
                        const seconds = dayjs.duration(timeInput * 1000).seconds() >= 10 ? dayjs.duration(timeInput * 1000).seconds() : '0' + dayjs.duration(timeInput * 1000).seconds()
                        const duration = `
                            ${ days  != '00' ? days + '<sup class=\'text-gray-600\'>d</sup>' : '<span class=\'text-gray-400\'>' + days + '<sup class=\'text-gray-600\'>d</sup></span>'}${ hours  != '00' ? hours + '<sup class=\'text-gray-600\'>h</sup>' : '<span class=\'text-gray-400\'>' + hours + '<sup class=\'text-gray-600\'>h</sup></span>'}${ minutes  != '00' || hours  != '00' ? minutes + '<sup class=\'text-gray-600\'>m</sup>' : '<span class=\'text-gray-400\'>' + minutes + '<sup class=\'text-gray-600\'>m</sup></span>'}
                        `
                        return duration
                    },
                    init() {
                        this.output = this.niceDuration()
                        setInterval(() => {
                            this.output = this.niceDuration()
                        }, 1000)
                    }
                }" x-html="output">
                </p>
            </div>
        @endif
    </div>
</div>
