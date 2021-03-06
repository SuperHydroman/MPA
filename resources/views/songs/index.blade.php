<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Songs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-5 w-full flex grid grid-rows-1 grid-cols-12">
                <a href="{{ route('songs.add') }}" class="transition ease-in-out duration-300 hover:bg-gray-200 text-center text-xl px-3 row-start-1 col-start-11 col-end-13 rounded-2xl bg-white border border-gray-400">
                    + Add song
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="text-2xl grid grid-rows-1 grid-cols-12 p-3 bg-white border-b border-gray-200">
                    <form class="w-full row-start-1 col-start-1 col-end-13 grid grid-rows-1 grid-cols-12" action="{{ route('songs.filter') }}" method="post">
                        @csrf
                        <div class="mt-4 row-start-1 col-start-1 col-end-2 text-center inline-block align-middle">
                            <button class="transition ease-in-out duration-300 hover:bg-gray-200 text-center text-xl px-4 py-1 rounded-2xl bg-white border border-gray-400" type="submit">Filter</button>
                        </div>

                        <div class="row-start-1 col-start-11 col-end-13">
                            <small class="float-right text-sm font-bold">Genre</small>
                            <select name="option" class="block appearance-none w-full bg-white-100 border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="genre" id="grid-state">
                                <option selected value="default">--- Default ---</option>
                                @foreach($genres as $genre)
                                    @if($filter != null)
                                        @if($filter == $genre->name)
                                            <option selected>{{ $genre->name }}</option>
                                        @else
                                            <option>{{ $genre->name }}</option>
                                        @endif
                                    @else
                                        <option>{{ $genre->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($songs as $song)
                    <div id="songsParent" class="transition ease-in-out duration-300 hover:bg-gray-200 text-2xl grid grid-rows-1 grid-cols-12 p-6 bg-white border-b border-gray-200">
                        <div id="test" class="row-start-1 col-start-1 col-end-4 border-r-2 border-gray-200">
                            <h2 class="font-bold">{{ $song->name }}</h2>
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
                                <a href="{{ route('session.add', $song->id) }}"><i class="far fa-plus-square cWidth text-2xl relative top-px"></i></a>
                                <a href="{{ route('songs.edit', $song->id) }}"><i class="far fa-edit cWidth"></i></a>
                                <a href="{{ route('songs.delete', $song->id) }}"><i class="far fa-trash-alt cWidth"></i></a>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
