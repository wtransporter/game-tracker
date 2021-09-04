<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Competition matches') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-4xl">
        <a href="{{ route('competitions.timetable.index', $game->competition_id) }}" 
                class="px-4 py-1 bg-blue-500 hover:bg-blue-700 cursor-pointer text-white rounded">
            Back
        </a>
        @if (session()->has('success'))
            <p class="text-green-700 text-xs mt-2 p-3 bg-green-200 rounded font-semibold mb-4">{{ session('success') }}</p>
        @endif
        <form action="{{ route('competitions.timetable.updateDate', $game->id) }}" method="POST" class="flex space-x-4 mt-4">
            @csrf
            @method('PATCH')
            <div class="flex space-x-4">
                <div>
                    <label class="block text-sm text-gray-600" for="">Home</label>
                    <div class="flex items-center space-x-2">
                        <img src="{{ $game->homeClub->logoPath() }}" alt="Logo" class="w-6 h-6">
                        <label class="block">{{ $game->homeClub->name }}</label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm text-gray-600">Away</label>
                    <div class="flex items-center space-x-2">
                        <img src="{{ $game->awayClub->logoPath() }}" alt="Logo" class="w-6 h-6">
                        <label class="block">{{ $game->awayClub->name }}</label>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center space-x-3">
                <input name="date" type="date" class="h-6" value="{{ $game->date->format('Y-m-d') }}">
                <input name="time" type="time" class="h-6" value="{{ $game->time }}">
                <button type="submit" class="text-blue-500 hover:text-blue-700 cursor-pointer">Submit</button>
            </div>
        </form>
    </div>
</x-admin>