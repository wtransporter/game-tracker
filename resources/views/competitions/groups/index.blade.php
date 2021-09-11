<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Competition Groups') }}
        </h2>
    </x-slot>
    <div class="mx-auto max-w-4xl">
        @if (session()->has('success'))
            <p class="text-green-700 text-xs mt-2 p-3 text-center bg-green-200 rounded font-semibold">{{ session('success') }}</p>
        @endif
        <x-groups-table :groups="$groups" :selectedClubs="$selectedClubs" :clubs="$clubs" />
    </div>
</x-admin>