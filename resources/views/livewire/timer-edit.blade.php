<div>
    @if ($timer && $timer->title)
        <div class="border-l-4 border-l-cosu-900 pl-2 transition-all">
            <h3 class="text-xl font-bold mb-6">
                Edit timer
            </h3>
            <div class="grid grid-cols-1 gap-4">
                <div class="relative">
                    <input required id="title" type="text" wire:model.debounce="timer.title" class="peer border-0 border-b focus:border-cosu-600 w-full mt-4 appearance-none focus:ring-0">
                    <label for="title" class="absolute pointer-events-none left-0 {{ $timer->title ? 'mt-0 text-xs font-bold text-black' : 'mt-6 text-gray-500 peer-focus:mt-0 peer-focus:text-black peer-focus:font-bold peer-focus:text-xs' }} transition-all">Title</label>
                    @error('timer.title')
                        <div class="text-red-700 text-xs mt-1 text-right">{{ $message }}</div>
                    @enderror
                </div>
                <div class="relative">
                    <textarea id="notes" rows="3" wire:model.debounce="timer.notes" class="peer border-0 border-b focus:border-cosu-600 w-full mt-4 appearance-none focus:ring-0"></textarea>
                    <label for="notes" class="absolute pointer-events-none left-0 {{ $timer->notes ? 'mt-0 text-xs font-bold text-black' : 'mt-6 text-gray-500 peer-focus:mt-0 peer-focus:text-black peer-focus:font-bold peer-focus:text-xs' }} transition-all">Notes (optional)</label>
                    @error('timer.notes')
                        <div class="text-red-700 text-xs mt-1 text-right">{{ $message }}</div>
                    @enderror
                </div>
                <div class="relative">
                    <input required id="start" type="datetime-local" wire:model.debounce="timer.start" class=" border-0 focus:border-cosu-600 border-b w-full mt-4 appearance-none focus:ring-0">
                    <label for="start" class="absolute pointer-events-none left-0 mt-0 text-xs font-bold text-black">Start date</label>
                    @error('timer.start')
                        <div class="text-red-700 text-xs mt-1 text-right">{{ $message }}</div>
                    @enderror
                </div>
                <div class="relative">
                    <input required id="end" type="datetime-local" wire:model.debounce="timer.end" class=" border-0 focus:border-cosu-600 border-b w-full mt-4 appearance-none focus:ring-0">
                    <label for="end" class="absolute pointer-events-none left-0 mt-0 text-xs font-bold text-black">End date</label>
                    @error('timer.end')
                        <div class="text-red-700 text-xs mt-1 text-right">{{ $message }}</div>
                    @enderror
                </div>
                <button wire:click="submit" class="w-full bg-cosu-700 hover:bg-cosu-800 rounded text-white p-2">
                    Update timer
                </button>
            </div>
        </div>
    @endif
</div>
