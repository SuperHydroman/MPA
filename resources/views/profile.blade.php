<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="font-bold text-2xl pb-2">Profile of {{ Auth::user()->name }}</h1>
                    <div class="divider mb-5 pb-5 border-gray-300 border-solid border-t"></div>
                    <p>Favourite Genre</p>
                    <p>Playlists</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
