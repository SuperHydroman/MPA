<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Deleting a Genre') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-2xl p-6 bg-white border-b border-gray-200">

                    <div class="grid relative flex items-center justify-center row-start-1 col-start-1 col-end-2">
                        <form class="w-full max-w-lg" method="POST" action=" {{ route('genres.remove', $genre->id) }} ">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <h1 class="w-full text-center text-2xl mb-3">Are you sure you want to delete this item?</h1>
                                <div class="w-full flex justify-center">
                                    <input disabled class="block w-1/2 bg-white-100 text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" value="{{ $genre->name }}">
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
                                    <a href="{{ route('genres.index') }}" class="cursor-pointer text-center transition ease-in-out duration-300 w-full shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
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
