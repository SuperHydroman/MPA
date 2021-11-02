<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Songs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($songs as $song)
                    <div id="songsParent" class="transition ease-in-out duration-300 hover:bg-gray-200 text-2xl grid grid-rows-1 grid-cols-12 p-6 bg-white border-b border-gray-200">
                        <div id="test" class="row-start-1 col-start-1 col-end-4 border-r-2 border-gray-200">
                            <h2 class="font-extrabold">{{ $song->name }}</h2>
                            <h5 class="italic">{{ $song->artist }}</h5>
                        </div>

                        <div class="grid relative flex items-center justify-center row-start-1 col-start-4 col-end-6">
                            <small class="text-xs absolute top-1 left-2">Genre</small>
                            <p class="italic underline">
                                {{ $song->genre->name }}
                            </p>
                        </div>

                        <div class="flex items-center justify-center row-start-1 col-start-7 col-end-9">
                            <p class="icons">
                                <i class="far fa-play-circle"></i> {{ $song->duration }}
                            </p>
                        </div>

                        <div class="flex items-center justify-center row-start-1 col-start-11 col-end-13">
                            <p>
                                <a href="{{ route('songs.add', 1) }}"><i class="far fa-plus-square cWidth text-2xl relative top-px"></i></a>
                                <a href="#"><i class="far fa-edit cWidth"></i></a>
                                <a href="#"><i class="far fa-trash-alt cWidth   "></i></a>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
