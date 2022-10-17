<div>
    <section aria-labelledby="profile-overview-title">

        <div class="rounded-lg bg-white overflow-hidden shadow mt-10 lg:mt-0">
            @if (!$tracker->items->whereNotNull('end')->count())
                <div class="bg-cosu-900 text-white text-center text-sm p-1">
                    {{ __('Please bookmark / save this URL. This is the only way to keep your tracker.') }}
                </div>
            @endif
            <div class="bg-white p-6">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <div class="sm:flex sm:space-x-5 flex-grow">
                        <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left flex-grow">
                            <div class="mb-4 h-10">
                                @if ($editTitle)
                                    <div class="flex relative" wire:key="editTitleTrue">
                                        <input wire:keydown.enter="saveTitle" wire:model="tracker.title" autofocus type="text" class="shadow-sm focus:ring-cosu-500 focus:border-cosu-500 block w-full sm:text-xl border-gray-300 rounded-md" placeholder="{{ __('No title') }}">
                                        @error('tracker.title')
                                            <div class="text-xs text-red-700 flex items-center justify-center mx-4">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <button wire:click="saveTitle" class="ml-4 inline-block justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-cosu-600 hover:bg-cosu-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cosu-500">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                @else
                                    <div class="py-2 cursor-pointer" wire:click="$set('editTitle', 'true')"  wire:key="editTitleFalse">
                                        @if ($tracker->title)
                                            <p class="text-xl font-light text-gray-900 sm:text-2xl">{{ $tracker->title }}</p>
                                        @else
                                            <p class="text-gray-300 cursor-pointer">{{ __('No title') }}</p>
                                        @endif
                                    </div>
                                @endif
                            </div>
                            <div class="w-full relative flex">
                                <input class="w-full text-sm pl-0 font-light text-black tracking-wide border-0 outline-none" disabled type="text" name="url" value="{{ url('/t/'.$tracker->identifier) }}" id="urlCopyField">
                                <div data-tippy-content="{{ __('Copy URL to clipboard') }}" class="flex-shrink-0 flex justify-start items-center cursor-pointer" onclick="copyToClipboard('{{ url('/t/'.$tracker->identifier) }}')">
                                    <i class="ri-clipboard-line ri-lg mx-1 opacity-40"></i>
                                </div>
                                <div data-tippy-content="{{ __('Download QR code') }}" wire:click="downloadQrCode" class="flex-shrink-0 flex justify-start items-center cursor-pointer">
                                    <i class="ri-qr-code-line ri-lg mx-1 opacity-40"></i>
                                </div>
                                @if ($tracker->items->whereNotNull('end')->count())
                                    <div data-tippy-content="{{ __('Export data') }}" x-data="{ downloadOpen: false }" class="opacity-40 flex-shrink-0 flex justify-start items-center cursor-pointer" @mouseleave.debounce.1000ms="downloadOpen = false">
                                        <i class="ri-download-line ri-lg mx-1" @click="downloadOpen = !downloadOpen"></i>
                                        <div x-show="downloadOpen" class="flex space-x-2">
                                            <div class="text-xs cursor-pointer" wire:click="export('xlsx')">XLSX</div>
                                            <div class="text-xs cursor-pointer" wire:click="export('csv')">CSV</div>
                                            <div class="text-xs cursor-pointer" wire:click="export('pdf')">PDF</div>
                                            <div class="text-xs cursor-pointer" wire:click="export('html')">HTML</div>
                                            <div class="text-xs cursor-pointer" wire:click="export('json')">JSON</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-200 bg-gray-50 flex divide-y divide-gray-200 sm:grid-cols-3 sm:divide-y-0 sm:divide-x">
                <div class="px-6 py-5 text-sm font-medium flex justify-center items-center text-cosu-600 text-center hover:bg-gray-200 cursor-pointer duration-300 ease-in-out w-1/2 md:w-3/4" wire:click="startTimer" onclick="fathom.trackGoal('ZK5L4BBF', 0);">
                    <i class="ri-play-circle-line ri-lg mr-2"></i>
                    <span class="text-cosu-600 flex justify-center items-center">
                        Start new timer
                    </span>
                </div>
                <div class="px-6 py-5 text-sm font-medium text-center hover:bg-gray-200 cursor-pointer duration-300 ease-in-out w-1/2 md:w-1/4" wire:click="createManualTimer">
                    <span class="text-gray-600">Create manually</span>
                </div>
            </div>
        </div>
    </section>

    <script>
        function copyToClipboard(str) {
            if (navigator && navigator.clipboard && navigator.clipboard.writeText) {
                return navigator.clipboard.writeText(str);
            } else {
                alert('{{ __('The Clipboard API is not available.') }}');
            }
        }
    </script>

</div>
