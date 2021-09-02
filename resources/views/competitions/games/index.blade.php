<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Competition matches') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-4xl">
        @foreach ($allGames as $date => $games)
            <h3 class="bg-blue-700 text-white p-1 pl-4">
                {{ $date }}
            </h3>
            <div class=" grid grid-cols-2">
                @foreach ($games as $game)
                <div class="text-gray-800 border p-6 flex justify-between relative">
                    @if ($game->status == 0)
                        <form action="{{ route('competitions.timetable.finish', $game->id) }}" method="POST">
                            @csrf
                            <button class="absolute right-1 top-1 text-red-500 hover:text-red-700 cursor-pointer text-xs">End</button>
                        </form>
                    @endif
                    <div class="flex justify-between w-full">
                        <div class="space-y-1">
                            <h3>
                                {{ $game->homeClub->name }}
                            </h3>
                            <h3>
                                {{ $game->awayClub->name }}
                            </h3>
                        </div>
                        <div class="px-2">
                            <div class="flex space-x-1">
                                <h3>
                                    {{ $game->hscore }}
                                </h3>
                                <form id="game-{{ $game->id }}" 
                                        action="{{ route('competitions.timetable.update', $game->id) }}" 
                                        method="POST" 
                                        class="flex flex-col w-6 space-y-1">
                                    @csrf
                                    @method('PATCH')
                                    <input name="hscore" value="1" hidden class="outline-none focus:ring-1">
                                    <button type="submit" class="h-4 w-4 border border-green-700 flex justify-center items-center">+</button>
                                </form>
                            </div>
                            <div class="flex space-x-1">
                                <h3>
                                    {{ $game->ascore }}
                                </h3>
                                <form id="game-{{ $game->id }}" 
                                        action="{{ route('competitions.timetable.update', $game->id) }}" 
                                        method="POST" 
                                        class="flex flex-col w-6 space-y-1">
                                    @csrf
                                    @method('PATCH')
                                    <input name="ascore" value="1" hidden class="outline-none focus:ring-1">
                                    <button type="submit" class="h-4 w-4 border border-green-700 flex justify-center items-center">+</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="text-center px-4">
                        <span class="text-sm">
                            {{ $game->date->format('D, M j') }}
                        </span>
                        <span class="text-sm">
                            {{ $game->time }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        @endforeach
    </div>
</x-admin>