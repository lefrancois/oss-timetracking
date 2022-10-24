<footer class="container mx-auto py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-sm text-gray-500 dark:text-gray-400">
        <div class="flex flex-col lg:flex-row justify-between space-y-2 lg:space-y-0">
            <div class="text-center lg:text-left">
                <span class="">&copy; {{ \Carbon\Carbon::now()->format('Y') }} COSU</span>
                <span class=""> All rights reserved.</span>
            </div>
            <div class="text-center hidden lg:block">
                <p>
                    <a href="https://usefathom.com/ref/ABAKKC" onclick="fathom.trackGoal('PMGAN0JI', 0);" target="_blank" class="text-xs">We ❤️ beautiful, simple website analytics by Fathom</a>
                </p>
            </div>
            <div class="text-center lg:text-left flex lg:block justify-center">
                <a class="block sm:inline hover:text-gray-700 mx-2" href="{{ route('legal') }}" target="_blank">{{ __('Legal Notice') }}</a>
                <a class="block sm:inline hover:text-gray-700 mx-2" href="{{ route('privacy') }}" target="_blank">{{ __('Privacy policy') }}</a>
            </div>
            <div class="text-center lg:hidden">
                <p>
                    <a href="https://usefathom.com/ref/ABAKKC" onclick="fathom.trackGoal('PMGAN0JI', 0);" target="_blank" class="text-xs">We ❤️ beautiful, simple website analytics by Fathom</a>
                </p>
            </div>
        </div>
    </div>
</footer>
