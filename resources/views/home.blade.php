<x-app>
    <x-slot name="header">
        <div class=" h-60 md:h-96">
            <div class="relative">
                <img src="/img/showcase.jpg" alt="" class="absolute top-0 left-0 w-full object-cover object-center h-60 md:h-96">
                <div class="absolute flex left-1/4 w-1/2 bg-gray-100 bg-opacity-60 mt-10 p-6 md:p-10 rounded">
                    <h3 class="mx-auto text-center text-2xl md:text-4xl lg:text-5xl text-gray-800 font-bold">
                        Football Live Scores
                    </h3>
                </div>
            </div>
        </div>
    </x-slot>

    <section class="py-4">
        <h3 class="text-5xl text-gray-800 text-center pb-2">{{ __('Upcoming Matches') }}</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 py-4">
            @foreach ($allGames->first()->whereNull('status')->sortBy('time')->take(3) as $item)
                <x-match-card :nextMatch="$item"/>
            @endforeach
        </div>
    </section>

    <x-competition-timetable :allGames="$allGames"/>
</x-app>