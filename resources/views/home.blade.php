<x-app>
    <x-slot name="header">
        <img src="/img/showcase.jpg" alt="">
    </x-slot>

    <section class="py-4">
        <h3 class="text-5xl text-gray-800 text-center pb-2">Next Matches</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 py-4">
            @foreach ($allGames->first()->whereNull('status')->sortBy('time')->take(3) as $item)
                <x-match-card :nextMatch="$item"/>
            @endforeach
        </div>
    </section>

    <x-competition-timetable :allGames="$allGames"/>
</x-app>