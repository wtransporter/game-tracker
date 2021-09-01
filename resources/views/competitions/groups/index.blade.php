<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Competition Groups') }}
        </h2>
    </x-slot>
    <div class="mx-auto max-w-4xl">
    @forelse ($groups as $group)
    <div class="overflow-x-auto">
        <div class="py-2 align-middle inline-block min-w-full">
            <div class="overflow-hidden">
                <table class=" table-auto w-full">
                    <thead class="justify-between">
                        <tr class="bg-blue-700">
                            <th class="p-2 text-center" colspan="8">
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
                            <td class="p-2">
                                <span class="font-semibold"> {{ $item->clubs[$loop->iteration-1]->name ?? '' }}</span>
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