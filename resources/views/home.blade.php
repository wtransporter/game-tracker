<x-app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Choose Competition') }}
        </h2>
    </x-slot>

    <x-competition-timetable :allGames="$allGames"/>
</x-app>