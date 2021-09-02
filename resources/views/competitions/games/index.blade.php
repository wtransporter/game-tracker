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
                <div class="text-gray-800 border p-6 flex justify-between">
                    <div class="flex justify-between w-full">
                        <div>
                            <h3>
                                {{ $game->homeClub->name }}
                            </h3>
                            <h3>
                                {{ $game->awayClub->name }}
                            </h3>
                        </div>
                        <div class="flex flex-col px-2">
                            <span>
                                {{ $game->hscore }}
                            </span>
                            <span>
                                {{ $game->ascore }}
                            </span>
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