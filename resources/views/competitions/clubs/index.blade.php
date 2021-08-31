<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <x-assign-club :clubs="$clubs" :competition="$competition"></x-assign-club>
        {{-- {{ __('Football Clubs') }}
        <x-club-table :clubs="$clubs" /> --}}
    </x-slot>

</x-admin>