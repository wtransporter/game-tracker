<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Competition matches') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-4xl">
        <form action="{{ route('competitions.timetable.updateDate', $game->id) }}" method="POST" class="flex space-x-4">
            @csrf
            @method('PATCH')
            <div class="flex space-x-4">
                <div>
                    <label class="block text-sm text-gray-600" for="">Home</label>
                    <label class="block">{{ $game->homeClub->name }}</label>
                </div>
                <div>
                    <label class="block text-sm text-gray-600">Away</label>
                    <label class="block">{{ $game->awayClub->name }}</label>
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