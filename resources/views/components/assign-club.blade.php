@props(['clubs', 'competition'])

<div class="overflow-x-auto">
    <div class="py-2 align-middle inline-block min-w-full">
        <div class="overflow-hidden">
            <table class=" table-auto w-full">
                <thead class="justify-between">
                    <tr class="bg-gray-700">
                        <th class="px-16 py-2 w-24">
                            <span class="text-gray-200">#</span>
                        </th>
                        <th class="px-16 py-2 text-left">
                            <span class="text-gray-200">Logo</span>
                        </th>
                        <th class="p-2 text-left">
                            <span class="text-gray-200">Club name</span>
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
                            <td class="px-16 py-2 text-left w-24">
                                <span class="font-semibold"> {{ $loop->iteration }}</span>
                            </td>
                            <td class="px-16 py-2 text-left">
                                <span></span>
                            </td>
                            <td class="p-2">
                                <span class="font-semibold"> {{ $club->name }}</span>
                            </td>
                            <td class="px-1 py-2 text-center text-gray-600">
                                <div class="flex items-center justify-center ">
                                    <div class="w-4 mr-2 transform hover:text-primary hover:scale-110 cursor-pointer">
                                        <attach-club 
                                            :competition="{{ $competition }}" 
                                            :club="{{ $club }}"
                                            :visible="{{ $competition->clubs->contains($club->id) ? 'false' : 'true' }}"></attach-club>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $clubs->links() }}
        </div>
    </div>
</div>