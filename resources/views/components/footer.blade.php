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
                    <a class="block sm:inline hover:text-gray-700 mx-2" href="#" target="_blank">{{ __('Privacy policy') }}</a>
                </div>
            </div>
        </div>
    </div>
</footer>
