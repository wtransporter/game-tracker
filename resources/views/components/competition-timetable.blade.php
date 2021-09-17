@props(['allGames'])

<div class="mx-auto max-w-4xl bg-white">
    @forelse ($allGames as $date => $games)
        <h3 class="bg-blue-700 text-white p-1 pl-4">
            {{ $date }}
        </h3>
        <div class="grid md:grid-cols-2">
            @foreach ($games as $game)
            <div class="text-gray-800 border px-2 py-6 md:px-6 flex justify-between relative">
                @auth
                    <a href="{{ route('competitions.timetable.edit', $game->id) }}" 
                        class="absolute left-1 top-1 text-blue-500 hover:text-blue-700 cursor-pointer text-xs">
                        Edit
                    </a>
                    @if (is_null($game->status))
                        <form action="{{ route('competitions.timetable.start', $game->id) }}" method="POST">
                            @csrf
                            <button class="absolute right-1 top-1 text-green-500 hover:text-green-700 cursor-pointer text-xs">Start</button>
                        </form>
                    @elseif ($game->status == 0)
                        <form action="{{ route('competitions.timetable.finish', $game->id) }}" method="POST">
                            @csrf
                            <button class="absolute right-1 top-1 text-red-500 hover:text-red-700 cursor-pointer text-xs">End</button>
                        </form>
                    @endif
                @endauth
                <div class="flex justify-between w-full text-sm">
                    <div class="space-y-1">
                        <div class=" flex items-center space-x-2">
                            <img src="{{ $game->homeClub->logoPath() }}" alt="Logo" class="h-6 w-6">
                            <h3>
                                {{ $game->homeClub->name }}
                            </h3>
                        </div>
                        <div class=" flex items-center space-x-2">
                            <img src="{{ $game->awayClub->logoPath() }}" alt="Logo" class="h-6 w-6">
                            <h3>
                                {{ $game->awayClub->name }}
                            </h3>
                        </div>
                    </div>
                    <div class="px-2">
                        @if (!is_null($game->status) && ($game->status == 0 || $game->status == 1))
                        <score-component route="{{ route('competitions.timetable.update', $game->id) }}"
                            :game="{{ $game }}">
                        </score-component>
                        {{-- <score-component route="{{ route('competitions.timetable.update', $game->id) }}"
                            :game="{{ $game }}"
                            home="false">
                        </score-component> --}}
                        {{-- <div class="flex space-x-1">
                            <h3 class="flex items-center {{ $game->hscore < $game->ascore ? 'text-black' : 'text-gray-600' }}">
                                {{ $game->ascore }}
                                <span class="text-xl w-6 pl-2 {!! $game->hscore > $game->ascore ? 'text-black' : 'text-white' !!}">
                                    {!! $game->hscore < $game->ascore ? 
                                        '<svg aria-label="Winner" height="8" role="img" width="6">
                                            <polygon fill="#000" points="6,0 6,8 0,4"></polygon>
                                        </svg>' : 
                                        '' !!}
                                </span>
                            </h3>
                            @if (!is_null($game->status) && $game->status == 0 && Auth::check())
                            <form id="game-{{ $game->id }}" 
                                    action="{{ route('competitions.timetable.update', $game->id) }}" 
                                    method="POST" 
                                    class="flex flex-col w-6 space-y-1">
                                @csrf
                                @method('PATCH')
                                <input name="ascore" value="1" hidden class="outline-none focus:ring-1">
                                <button type="submit" class="h-4 w-4 border border-green-700 flex justify-center items-center">+</button>
                            </form>
                            @endif
                        </div> --}}
                        @endif
                    </div>
                </div>
                <div class="w-28 text-center md:px-4 border-l border-solid border-gray-700 border-opacity-20">
                    @if ($game->status == 1)
                        <span class="inlilne-block">
                            FT
                        </span>
                        <span class="text-sm inline-block text-gray-600">
                            {{ $game->date->format('M j') }}
                        </span>
                    @else
                        <span class="text-sm">
                            {{ $game->date->format('D, M j') }}
                        </span>
                        <span class="text-sm">
                            {{ $game->time }}
                        </span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    @empty
        <p class="text-red-700 text-xs mt-2 p-3 bg-red-200 rounded font-semibold">{{ __('There are no scheduled matches yet. Come back later.') }}</p>
    @endforelse
</div>