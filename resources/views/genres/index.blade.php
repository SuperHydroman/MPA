<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Genres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-5 w-full flex grid grid-rows-1 grid-cols-12">
                <a href="{{ route('genres.add') }}" class="transition ease-in-out duration-300 hover:bg-gray-200 text-center text-xl px-3 row-start-1 col-start-11 col-end-13 rounded-2xl bg-white border border-gray-400"> + Add genre</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($genres as $genre)
                    <div id="genresParent" class="transition ease-in-out duration-300 hover:bg-gray-200 text-2xl grid grid-rows-1 grid-cols-12 p-6 bg-white border-b border-gray-200">

                        <div class="ml-4 grid relative flex items-center float-left row-start-1 col-start-1 col-end-8">
                            <p class="italic underline">
                                {{ $genre->name }}
                            </p>
                        </div>

                        <div class="flex items-center justify-center row-start-1 col-start-11 col-end-13">
                            <p>
                                <a href="{{ route('genres.edit', $genre->id) }}"><i class="far fa-edit cWidth"></i></a>
                                <a href="{{ route('genres.delete', $genre->id) }}"><i class="far fa-trash-alt cWidth   "></i></a>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
