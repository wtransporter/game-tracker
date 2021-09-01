<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <form action="{{ route('competitions.clubs.create', $competition->id) }}" method="GET">
            <input id="search" name="search" type="text" placeholder="Search" value="{{ request('search') }}">
        </form>
        <x-assign-club :clubs="$clubs" :competition="$competition"></x-assign-club>
    </x-slot>

</x-admin>