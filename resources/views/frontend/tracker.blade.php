@extends('layouts.frontend')

@section('page')
<div class="p-2">
    <div class="container max-w-sm mx-auto grid grid-cols-1 gap-3 flex-col">
        <div class="space-y-3">
            <div class="flex">
                <button class="bg-cosu-800 text-white hover:bg-cosu-900 transition-colors p-2 rounded-l w-full flex-grow">
                    {{ __('Start timer') }}
                </button>
                <button class="bg-cosu-700 text-white transition-colors p-2 rounded-r w-16 flex-shrink" data-tippy-content="{{ __('Add manual timer') }}">
                    <i class="ri-edit-box-line p-1 text-white"></i>
                </button>
            </div>
            <x-tracker :data="$tracker"></x-tracker>
        </div>
        <div>
            {{-- @livewire('timer-edit') --}}
        </div>
    </div>
</div>
@endsection
