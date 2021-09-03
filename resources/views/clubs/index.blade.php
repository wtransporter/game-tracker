<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Clubs List') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <x-assign-club :clubs="$clubs"></x-assign-club>
    </x-slot>
</x-admin>