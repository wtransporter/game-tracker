@props(['clubs', 'competition' => null])

<div class="overflow-x-auto">
    @if ($competition)
        <form action="{{ route('competitions.clubs.create', $competition->id) }}" method="GET">
            <input id="search" name="search" type="text" placeholder="Search" value="{{ request('search') }}">
        </form>
    @endif
    <div class="py-2 align-middle inline-block min-w-full">
        <div class="overflow-hidden">
            <table class=" table-auto w-full">
                <thead class="justify-between">
                    <tr class="bg-gray-700">
                        <th class="px-8 py-2 w-24">
                            <span class="text-gray-200">#</span>
                        </th>
                        <th class="px-8 py-2 text-left">
                            <span class="text-gray-200">Logo</span>
                        </th>
                        <th class="p-2 text-left">
                            <span class="text-gray-200">Club name</span>
                        </th>
                        <th class="p-2 text-center">
                            <span class="text-gray-200">Country</span>
                        </th>
                        <th class="px-16 py-2">
                            <span class="text-gray-200">Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-gray-200">
                    @if ($clubs->count())
                        @foreach ($clubs as $club)
                        <tr class="bg-white border-2 border-gray-300">
                            <td class="px-8 py-2 text-left w-12">
                                <span class="font-semibold"> {{ $loop->iteration + ($clubs->perPage() * ($clubs->currentPage()-1)) }}</span>
                            </td>
                            <td class="px-8 py-2 text-left">
                                <img src="{{ $club->logoPath() }}" alt="Logo" class="h-6 w-6">
                            </td>
                            <td class="p-2">
                                <span class="font-semibold"> {{ $club->name }}</span>
                            </td>
                            <td class="p-2 text-center">
                                <span class="font-semibold"> {{ $club->country_code }}</span>
                            </td>
                            <td class="px-1 py-2 text-gray-600 flex items-center justify-around">
                                <div class="h-4 w-4">
                                    <a href="{{ route('clubs.edit', $club->id) }}" class="text-blue-500 hover:text-blue-700">
                                        <svg class="h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                </div>
                                @if ($competition)
                                    <div class="flex items-center justify-center ">
                                        <div class="w-4 mr-2 transform hover:text-primary hover:scale-110 cursor-pointer">
                                            <attach-club 
                                                :competition="{{ $competition }}" 
                                                :club="{{ $club }}"
                                                :visible="{{ $competition->clubs->contains($club->id) ? 'false' : 'true' }}"></attach-club>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $clubs->withQueryString()->links() }}
        </div>
    </div>
</div>