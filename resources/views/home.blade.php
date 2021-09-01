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
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"></path>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-primary hover:scale-110 cursor-pointer">
                                            <a href="{{ route('groups.competitions.index', $competition->id) }}" class="text-blue-500 hover:text-blue-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <path fill="currentColor" d="M61.77 401l17.5-20.15a19.92 19.92 0 0 0 5.07-14.19v-3.31C84.34 356 80.5 352 73 352H16a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h22.83a157.41 157.41 0 0 0-11 12.31l-5.61 7c-4 5.07-5.25 10.13-2.8 14.88l1.05 1.93c3 5.76 6.29 7.88 12.25 7.88h4.73c10.33 0 15.94 2.44 15.94 9.09 0 4.72-4.2 8.22-14.36 8.22a41.54 41.54 0 0 1-15.47-3.12c-6.49-3.88-11.74-3.5-15.6 3.12l-5.59 9.31c-3.72 6.13-3.19 11.72 2.63 15.94 7.71 4.69 20.38 9.44 37 9.44 34.16 0 48.5-22.75 48.5-44.12-.03-14.38-9.12-29.76-28.73-34.88zM496 224H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zM16 160h64a8 8 0 0 0 8-8v-16a8 8 0 0 0-8-8H64V40a8 8 0 0 0-8-8H32a8 8 0 0 0-7.14 4.42l-8 16A8 8 0 0 0 24 64h8v64H16a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8zm-3.91 160H80a8 8 0 0 0 8-8v-16a8 8 0 0 0-8-8H41.32c3.29-10.29 48.34-18.68 48.34-56.44 0-29.06-25-39.56-44.47-39.56-21.36 0-33.8 10-40.46 18.75-4.37 5.59-3 10.84 2.8 15.37l8.58 6.88c5.61 4.56 11 2.47 16.12-2.44a13.44 13.44 0 0 1 9.46-3.84c3.33 0 9.28 1.56 9.28 8.75C51 248.19 0 257.31 0 304.59v4C0 316 5.08 320 12.09 320z"></path>
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
