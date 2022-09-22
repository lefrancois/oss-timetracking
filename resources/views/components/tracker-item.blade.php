<div x-data="{ open: false }" x-cloak>
    <div class="flex shadow-sm ring-1 ring-offset-2 ring-cosu-200 justify-between group cursor-pointer p-2 rounded bg-gradient-to-r from-white to-cosu-100 relative transition-all duration-500 delay-100 {{ $item->deleted ? 'opacity-30 hover:opacity-100' : '' }}">
        <div class="flex-grow">
            <h3 class="line-clamp-1">
                {{ $item->title }}
            </h3>
            <div class="overflow-hidden line-clamp-2 h-0 group-hover:h-8 text-gray-500 text-xs transition-all duration-500 delay-100">
                {{  $item->notes ?? '<span class=\'text-gray-300\'>Click to add description</span>' }}
            </div>
        </div>
        <div class="flex-grow-0 flex items-center">
            @if ($item->edited)
                <div class="ml-4 text-sm bg-cosu-400 text-white px-2 py-0.5 rounded tracking-tighter">edited</div>
            @endif
            @if ($item->manual)
                <div class="ml-4 text-sm bg-cosu-400 text-white px-2 py-0.5 rounded tracking-tighter">manual</div>
            @endif
            @if ($item->deleted)
                <div class="ml-4 text-sm bg-cosu-400 text-white px-2 py-0.5 rounded tracking-tighter">deleted</div>
            @endif
        </div>
        <div class="w-16 flex items-center whitespace-nowrap ml-8 flex-grow-0 flex-shrink-0 justify-end pl-2 tabular-nums">
            {!! $time !!}
        </div>
    </div>
</div>
