<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <form action="{{ route('competitions.store') }}" method="POST">
            @csrf
            <div class="space-y-2">
                <div>
                    <label for="title" class="block text-sm text-gray-800">Competition name</label>
                    <input id="title" type="text" name="title" class="h-8 rounded">
                </div>
                <div>
                    <label for="size" class="block text-sm text-gray-800">Number of groups</label>
                    <input id="size" type="number" name="size" class="h-8 rounded">
                </div>
                <div>
                    <label for="group_size" class="block text-sm text-gray-800">Number of clubs in group</label>
                    <input id="group_size" type="number" name="group_size" class="h-8 rounded">
                </div>
                <button class="px-3 py-1 bg-blue-600 hover:bg-blue-700 transition duration-200 ease-in-out rounded text-white">Next</button>
            </div>
        </form>
        {{-- {{ __('Football Clubs') }}
        <x-club-table :clubs="$clubs" /> --}}

        <div class="overflow-x-auto">
            <div class="py-2 align-middle inline-block min-w-full">
                <div class="overflow-hidden">
                    <table class=" table-auto w-full">
                        <thead class="justify-between">
                            <tr class="bg-gray-700">
                                <th class="px-16 py-2 w-24">
                                    <span class="text-gray-200">#</span>
                                </th>
                                <th class="p-2 text-left">
                                    <span class="text-gray-200">Competition name</span>
                                </th>
                                <th class="px-16 py-2 text-left">
                                    <span class="text-gray-200">No Of Groups</span>
                                </th>
                                <th class="px-16 py-2">
                                    <span class="text-gray-200">Assign clubs</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-200">
                            @foreach ($competitions as $competition)
                            <tr class="bg-white border-2 border-gray-300">
                                <td class="px-16 py-2 text-left w-24">
                                    <span class="font-semibold"> {{ $loop->iteration }}</span>
                                </td>
                                <td class="p-2">
                                    <span class="font-semibold"> {{ $competition->name }}</span>
                                </td>
                                <td class="px-16 py-2 text-left">
                                    <span>{{ $competition->size }}</span>
                                </td>
                                <td class="px-1 py-2 text-center text-gray-600">
                                    <div class="flex items-center justify-center ">
                                        <div class="w-4 mr-2 transform hover:text-primary hover:scale-110 cursor-pointer">
                                            <a href="{{ route('competitions.clubs.create', $competition->id) }}" class="text-blue-500 hover:text-blue-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-slot>

</x-admin>
