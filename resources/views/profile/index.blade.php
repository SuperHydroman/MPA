<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="font-bold text-2xl pb-2">{{ Auth::user()->name }}</h1>
                    <div class="divider mb-3 pb-3 border-gray-300 border-solid border-t"></div>

                    <div class="mb-3 w-full flex grid grid-rows-1 grid-cols-12">
                        <h1 class="font-bold text-lg pb-1 md:w-1/2 row-start-1 col-start-1 col-end-3">Playlist</h1>
                        @if($songs != null)
                            <a href="{{ route('session.save') }}" class="transition ease-in-out duration-300 hover:bg-gray-200 text-center text-xl px-3 row-start-1 col-start-11 col-end-13 rounded-2xl bg-white border border-gray-400">
                                + Save playlist
                            </a>
                        @endif
                    </div>
                        @if($songs != null)
                            @foreach($songs as $song)
                                <div id="songsParent" class="transition ease-in-out duration-300 hover:bg-gray-200 text-2xl grid grid-rows-1 grid-cols-12 p-6 bg-white border-b border-gray-200">
                                    <div class="row-start-1 col-start-1 col-end-4 border-r-2 border-gray-200">
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
                                            <i class="far fa-play-circle"></i> {{ date("i:s", strtotime($song->duration)) }}
                                        </p>
                                    </div>

                                    <div class="flex items-center justify-center row-start-1 col-start-11 col-end-13">
                                        <p>
                                            <a href="{{ route('session.delete', $song->id) }}"><i class="far fa-trash-alt cWidth"></i></a>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            You don't have any songs in your playlist yet.
                        @endif
                        <h1 class="mt-5 font-bold text-lg pb-2">Favourite Genre</h1>
                        <h5>You don't have a favourite genre yet.</h5>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
