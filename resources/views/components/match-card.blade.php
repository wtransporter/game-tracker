@props(['nextMatch'])

<div class="rounded my-2 md:my-0 md:mx-2 p-5 text-white text-center" style="background-image: url('/img/card.png'); background-size: cover;">
    <a href="#">
        <div class="flex flex-col items-center">
            <div class="date">{{ $nextMatch->date->format('D, M j') }}</div>
            <div class="text-sm">{{ $nextMatch->time }}</div>
        </div>
        <div class="inline-flex align-middle items-center mt-1 w-full">
            <div class="flex-1 flex flex-col items-center">
                <img class="w-12 h-12 xl:w-16 xl:h-16" src="{{ $nextMatch->homeClub->logoPath() }}" alt="Manchester Unt">
                <div class="text-sm mt-1">
                    {{ $nextMatch->homeClub->name }}
                </div>
            </div>
            <div class="flex-1 flex justify-center align-middle w-full text-3xl">
                @if (!is_null($nextMatch->status))
                    {{ $nextMatch->hscore }} - {{ $nextMatch->ascore }}
                @endif
            </div>
            <div class="flex-1 flex flex-col items-center">
                <img class="w-12 h-12 xl:w-16 xl:h-16" src="{{ $nextMatch->awayClub->logoPath() }}" alt="Liverpool">
                <div class="text-sm mt-1">
                    {{ $nextMatch->awayClub->name }}
                </div>
            </div>
        </div>
    </a>
</div>