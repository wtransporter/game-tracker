<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Edit Club ') }} {{ $club->name }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-4xl">
        <form action="{{ route('clubs.update', $club->id) }}" method="POST" class="max-w-2xl p-6 mx-auto flex border rounded" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div>
                <label class="block text-sm text-gray-600">Logo</label>
                <img src="{{ $club->logoPath() }}" alt="Logo" class="w-24 my-2">
                <input name="logo" type="file" >
            </div>
            <div class="flex flex-col items-start">
                <label class="block text-sm text-gray-600" for="">Name</label>
                <input name="name" type="text" value="{{ $club->name }}" class="my-2">
                <button type="submit" class="text-blue-500 hover:text-blue-700 cursor-pointer">Submit</button>
            </div>
        </form>
    </div>
</x-admin>