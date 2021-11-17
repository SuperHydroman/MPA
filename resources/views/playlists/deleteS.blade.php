<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Deleting a Song') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-2xl p-6 bg-white border-b border-gray-200">
                    <div class="grid relative flex items-center justify-center row-start-1 col-start-1 col-end-2">
                        <form class="w-full max-w-lg" method="POST" action=" {{ route('playlists.removeS', $song->id) }} ">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-4">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                        Song Name
                                    </label>
                                    <input disabled class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" value="{{ $song->songs->name }}" type="text">
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                        Artist
                                    </label>
                                    <input disabled class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-last-name" value="{{ $song->songs->artist }}" type="text">
                                </div>
                            </div>


                            <div class="flex flex-wrap -mx-3 mb-4">
                                <div class="w-full md:w-3/5 px-3 mb-4">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                        Genre
                                    </label>
                                    <div class="relative">
                                        <select disabled class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="genre" id="grid-state">
                                            <option selected>{{ $song->songs->genre->name }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="w-full md:w-1/5 px-3 mb-4">
                                    <div class="relative">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                            Minutes
                                        </label>
                                        <input disabled class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-last-name" type="number" min="00" max="59" value="{{ date("i", strtotime($song->songs->duration)) }}">
                                    </div>
                                </div>
                                <div class="w-full md:w-1/5 px-3 mb-4">
                                    <div class="relative">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                            Seconds
                                        </label>
                                        <input disabled class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-last-name"type="number" min="00" max="59" value="{{ date("s", strtotime($song->songs->duration)) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="md:block md:items-center">
                                <div class="md:w-1/3"></div>
                                <div class="md:w-3/3">
                                    <button class="transition ease-in-out duration-300 w-full shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                        Delete
                                    </button>
                                </div>
                                <div class="md:w-1/3 my-3"></div>
                                <div class="md:w-3/3">
                                    <a href="{{ route('songs.index') }}" class="cursor-pointer text-center transition ease-in-out duration-300 w-full shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
