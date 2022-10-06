<section aria-labelledby="profile-overview-title">
    <div class="rounded-lg bg-white overflow-hidden shadow mt-2 lg:mt-0">
        <div>

            <dl class="m-6 flex flex-col">
                <div class="bg-cosu-500 overflow-hidden shadow rounded-lg col-span-2 sm:col-span-2">
                    <div class="px-4 py-5 sm:p-4">
                        <dt class="text-sm text-white truncate">
                            {{ __('Total time') }}
                        </dt>
                        <dd class="mt-1 text-xl font-medium text-white">
                            {!! str_replace(['text-gray-600','text-gray-400'], 'white', $totalTime) !!}
                        </dd>
                    </div>
                </div>
                <div class="flex">
                    <div class="bg-white overflow-hidden shadow rounded-lg w-1/2 mr-2 mt-4">
                        <div class="px-4 py-5 sm:p-4">
                            <dt class="text-sm text-gray-500 truncate">
                                {{ __('First timer started') }}
                            </dt>
                            <dd class="mt-1 text-xl font-medium text-gray-900">
                                {{ $firstStart }}
                            </dd>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow rounded-lg w-1/2 ml-2 mt-4">
                        <div class="px-4 py-5 sm:p-4">
                            <dt class="text-sm text-gray-500 truncate">
                                {{ __('Last timer stopped') }}
                            </dt>
                            <dd class="mt-1 text-xl font-medium text-gray-900">
                                {{ $lastEnd }}
                            </dd>
                        </div>
                    </div>
                </div>
            </dl>
        </div>
    </div>
</section>
