<section>
    <div class="rounded-lg bg-white overflow-hidden shadow mt-2 lg:mt-0 p-6">
        <div>
            <div class="flow-root">
                <h4 class="text-lg mb-4">
                    {{ __('Roadmap') }}
                </h4>
                <ul role="list" class="-mb-8">

                    <x-roadmap-item icon="bar-chart">
                        Charts, everybody loves charts
                    </x-roadmap-item>
                    <x-roadmap-item icon="table">
                        JSON, CSV and XLS export
                    </x-roadmap-item>
                    <x-roadmap-item icon="price-tag-3">
                        Tags for timers
                    </x-roadmap-item>
                    <x-roadmap-item icon="flag" :end="true" color="red">
                        Rule the world
                    </x-roadmap-item>

                </ul>
            </div>
        </div>
    </div>
</section>
