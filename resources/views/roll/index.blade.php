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
                        <p class="text-gray-600 mb-1">{{ $anime->episodes }} episodes</p>
                        <p class="text-indigo-600 font-semibold">Average Rating: {{ number_format($anime->ratings_avg_score ?? 0, 1) }} ★</p>
                        
                        <div class="mt-4">
                            <a href="{{ route('roll') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Roll Again
                            </a>
                        </div>
                    </div>

                    <hr class="my-6">

                    @auth
                        <form action="{{ route('ratings.store') }}" method="POST" class="max-w-md mx-auto">
                            @csrf
                            <input type="hidden" name="anime_id" value="{{ $anime->id }}">

                            <div class="mb-4 text-center">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Your Score</label>
                                <div class="flex flex-row-reverse justify-center gap-2">
                                    @for($i = 5; $i >= 1; $i--)
                                        <input type="radio" id="star{{ $i }}" name="score" value="{{ $i }}" class="hidden peer" required>
                                        <label for="star{{ $i }}" class="cursor-pointer text-4xl text-gray-300 peer-hover:text-yellow-400 peer-checked:text-yellow-500 hover:text-yellow-400 transition-colors">
                                            ★
                                        </label>
                                    @endfor
                                </div>
                                @error('score')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="comment" class="block text-sm font-medium text-gray-700">Comment (optional)</label>
                                <textarea name="comment" id="comment" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                            </div>

                            <div class="flex justify-center">
                                <button type="submit" class="inline-flex items-center px-6 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500">
                                    Submit Rating
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="text-center bg-gray-50 p-6 rounded-lg">
                            <p class="text-gray-600 mb-4">You must be logged in to rate animes.</p>
                            <a href="{{ route('login') }}" class="text-indigo-600 font-bold hover:underline">Log in here</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <style>
        .flex-row-reverse label:hover,
        .flex-row-reverse label:hover ~ label,
        .flex-row-reverse input:checked ~ label {
            color: #fbbf24;
        }
    </style>
</x-app-layout>