<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roll Anime') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('error'))
                        <div class="mb-4 text-red-600">{{ session('error') }}</div>
                    @endif

                    <div class="text-center mb-6">
                        <img src="{{ $anime->image_url }}" class="h-64 mx-auto rounded-lg shadow-md mb-4">
                        <h3 class="text-2xl font-bold">{{ $anime->title }}</h3>
                        <p class="text-gray-600">⭐ {{ $anime->score }} | {{ $anime->episodes }} episodes</p>
                    </div>

                    <form action="{{ route('ratings.store') }}" method="POST" class="max-w-md mx-auto">
                        @csrf
                        <input type="hidden" name="anime_id" value="{{ $anime->id }}">

                        <div class="mb-4">
                            <label for="score" class="block text-sm font-medium text-gray-700">Your Score (1-10)</label>
                            <input type="number" name="score" id="score" min="1" max="10" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div class="mb-4">
                            <label for="comment" class="block text-sm font-medium text-gray-700">Comment (optional)</label>
                            <textarea name="comment" id="comment" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        </div>

                        <div class="flex justify-between">
                            <a href="{{ route('roll') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Roll Again
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500">
                                Submit Rating
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>