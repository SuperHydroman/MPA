<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Playlists') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($playlists as $playlist)
                        <div id="genresParent" class="transition ease-in-out duration-300 hover:bg-gray-200 text-2xl grid grid-rows-1 grid-cols-12 p-6 bg-white border-b border-gray-200">

                            <div class="ml-4 grid relative flex items-center float-left row-start-1 col-start-1 col-end-8">
                                <p class="italic underline">
                                    {{ $playlist->name }}
                                </p>
                            </div>

                            <div class="flex items-center justify-center row-start-1 col-start-0 col-end-1 relative text-lg">
                                <p>
                                    <a href="{{ route('playlists.info', $playlist->id) }}"><i class="fas fa-info-circle"></i></a>
                                </p>
                            </div>
                            <div class="flex items-center justify-center row-start-1 col-start-11 col-end-13">
                                <p>
                                    <a href="{{ route('genres.delete', $playlist->id) }}"><i class="far fa-trash-alt cWidth"></i></a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
