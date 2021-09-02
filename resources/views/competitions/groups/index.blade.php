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
    @forelse ($groups as $group)
    <div class="overflow-x-auto">
        <div class="py-2 align-middle inline-block min-w-full">
            <div class="overflow-hidden">
                <table class=" table-auto w-full">
                    <thead class="justify-between">
                        <tr class="bg-blue-700">
                            <th class="p-2 text-center" colspan="9">
                                <span class="text-gray-200">{{ $group->name }}</span>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-left">
                                <span class="p-2 pl-4 text-gray-500 text-sm font-normal">Club</span>
                            </th>
                            <th class="p-2 text-center">
                                <span class="text-gray-500 text-sm font-normal">W</span>
                            </th>
                            <th class="p-2 text-center">
                                <span class="text-gray-500 text-sm font-normal">D</span>
                            </th>
                            <th class="p-2 text-center">
                                <span class="text-gray-500 text-sm font-normal">L</span>
                            </th>
                            <th class="p-2 text-center">
                                <span class="text-gray-500 text-sm font-normal">GS</span>
                            </th>
                            <th class="p-2 text-center">
                                <span class="text-gray-500 text-sm font-normal">GC</span>
                            </th>
                            <th class="p-2 text-center">
                                <span class="text-gray-500 text-sm font-normal">GD</span>
                            </th>
                            <th class="p-2 text-center">
                                <span class="text-gray-500 text-sm font-normal">Pts</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-200 divide-y divide-gray-300 border-b border-t border-gray-300">
                        @foreach ($group->matches as $item)
                        <tr class="bg-white">
                            <td class="p-2 text-left w-4">
                                <span class="font-semibold"> {{ $loop->iteration }}</span>
                            </td>
                            <td class="p-2 flex items-center justify-between">
                                @if ($selectedClubs->contains($item->pivot->club_id))
                                    @php
                                        $current = $selectedClubs->where('id', '=', $item->pivot->club_id)->first();
                                    @endphp
                                
                                    <span>{{ $current->name }}</span>
                                @endif
                                <form action="{{ route('groups.competitions.store', [$group->competition_id, $group->id]) }}" method="POST" class="flex space-x-1">
                                    @csrf
                                    <input name="rbr" hidden type="text" value="{{ $item->pivot->id }}">
                                    <select name="club_id" id="{{$group->id}}" class="h-8 w-48 text-sm py-0">
                                        <option value="">Select</option>
                                        @foreach ($clubs as $club)
                                            <option value="{{ $club->id }}" {{ $club->id == $item->pivot->club_id ? 'selected' : '' }}>{{ $club->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="text-green-500 hover:text-green-700 w-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                            <td class="w-10 py-2 text-center">
                                <span>{{ $item->clubs[$loop->iteration-1]->pivot->win ?? 0 }}</span>
                            </td>
                            <td class="w-10 py-2 text-center">
                                <span>{{ $item->clubs[$loop->iteration-1]->pivot->draw ?? 0 }}</span>
                            </td>
                            <td class="w-10 py-2 text-center">
                                <span>{{ $item->clubs[$loop->iteration-1]->pivot->lost ?? 0 }}</span>
                            </td>
                            <td class="w-10 py-2 text-center">
                                <span>{{ $item->clubs[$loop->iteration-1]->pivot->scored ?? 0 }}</span>
                            </td>
                            <td class="w-10 py-2 text-center">
                                <span>{{ $item->clubs[$loop->iteration-1]->pivot->conceded ?? 0 }}</span>
                            </td>
                            <td class="w-10 py-2 text-center">
                                <span>{{ $item->clubs[$loop->iteration-1]->pivot->scored - $item->clubs[$loop->iteration-1]->pivot->conceded ?? 0 }}</span>
                            </td>
                            <td class="w-10 py-2 text-center">
                                <span>{{ $item->clubs[$loop->iteration-1]->pivot->points ?? 0 }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @empty
        <p class="text-red-700 text-xs mt-2 p-3 bg-red-200 rounded font-semibold">
            This competitions has no defined matches
        </p>
    @endforelse
    </div>
</x-admin>