<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editing a Song') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-2xl p-6 bg-white border-b border-gray-200">

                    <div class="grid relative flex items-center justify-items-center row-start-1 col-start-1 col-end-2">
                        <form class="w-full max-w-full flex flex-wrap" method="POST" action=" {{ route('songs.update', $song->id) }} ">
                            @csrf
{{--                            Old section of the form--}}
                            <h1 class="mb-2 px-3 text-left text-2xl md:w-1/2 font-bold">Old</h1>
                            <h1 class="mb-2 px-3 text-right text-2xl md:w-1/2 font-bold">New</h1>
                            <div id="first-part" class="px-3 grid md:w-1/2 flex flex-wrap">
                                <div class="flex flex-wrap -mx-3 mb-4">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                               for="grid-first-name">
                                            Song Name
                                        </label>
                                        <input disabled class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            id="grid-first-name" value="{{ $song->name }}" type="text">
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                               for="grid-last-name">
                                            Artist
                                        </label>
                                        <input disabled class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            id="grid-last-name" value="{{ $song->artist }}" type="text">
                                    </div>
                                </div>


                                <div class="flex flex-wrap -mx-3 mb-4">
                                    <div class="w-full md:w-3/5 px-3 mb-4">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                               for="grid-state">
                                            Genre
                                        </label>
                                        <div class="relative">
                                            <select disabled class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                name="genre" id="grid-state">
                                                <option selected>{{ $genre->name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="w-full md:w-1/5 px-3 mb-4">
                                        <div class="relative">
                                            <label
                                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                for="grid-last-name">
                                                Minutes
                                            </label>
                                            <input disabled class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                id="grid-last-name" value="{{ $minutes }}" type="number">
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/5 px-3 mb-4">
                                        <div class="relative">
                                            <label
                                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                for="grid-last-name">
                                                Seconds
                                            </label>
                                            <input disabled class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                id="grid-last-name" value="{{ $seconds }}" type="number">
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            End of the old section--}}

{{--                            Start of the new section--}}
                            <div id="second-part" class="px-3 grid md:w-1/2 flex flex-wrap">
                                <div class="flex flex-wrap -mx-3 mb-4">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                               for="grid-first-name">
                                            Song Name
                                        </label>
                                        <input
                                            class="appearance-none block w-full bg-white-100 text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            id="grid-first-name" name="song_name" type="text" placeholder="Example name">
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                               for="grid-last-name">
                                            Artist
                                        </label>
                                        <input
                                            class="appearance-none block w-full bg-white-100 text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            id="grid-last-name" name="artist_name" type="text" placeholder="Artist name">
                                    </div>
                                </div>


                                <div class="flex flex-wrap -mx-3 mb-4">
                                    <div class="w-full md:w-3/5 px-3 mb-4">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                               for="grid-state">
                                            Genre
                                        </label>
                                        <div class="relative">
                                            <select
                                                class="block appearance-none w-full bg-white-100 border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                name="genre" id="grid-state">
                                                @foreach($genres as $genre)
                                                    @if($genre->name == "Frenchcore")
                                                        <option value="{{ $genre->id }}"
                                                                selected>{{ $genre->name }}</option>
                                                    @else
                                                        <option>{{ $genre->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="w-full md:w-1/5 px-3 mb-4">
                                        <div class="relative">
                                            <label
                                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                for="grid-last-name">
                                                Minutes
                                            </label>
                                            <input
                                                class="appearance-none block w-full bg-white-100 text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                id="grid-last-name" name="minutes" min="00" max="59" type="number" placeholder="00">
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/5 px-3 mb-4">
                                        <div class="relative">
                                            <label
                                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                for="grid-last-name">
                                                Seconds
                                            </label>
                                            <input
                                                class="appearance-none block w-full bg-white-100 text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                id="grid-last-name" name="seconds" min="00" max="59" type="number" placeholder="00">
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            End of the new section--}}

                            <div class="w-full px-3 md:block md:items-center">
                                <div class="md:w-2/2">
                                    <button
                                        class="w-full shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                        type="submit">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
