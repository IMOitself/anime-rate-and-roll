<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 text-center">
                    <h3 class="text-2xl font-bold mb-4">Ready to rate some anime?</h3>
                    <a href="{{ route('roll') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-indigo-500 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Start Rating Now
                    </a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Your Ratings</h3>

                    @if($ratings->isEmpty())
                        <p>No ratings yet. <a href="{{ route('roll') }}" class="text-indigo-600 underline">Roll an anime</a> to start.</p>
                    @else
                        <div class="space-y-4">
                            @foreach($ratings as $rating)
                                <div class="border rounded-lg p-4 flex justify-between items-center">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ $rating->anime->image_url }}" class="h-20 rounded">
                                        <div>
                                            <a href="{{ route('animes.show', $rating->anime) }}" class="font-semibold text-indigo-600 hover:underline">{{ $rating->anime->title }}</a>
                                            <p class="text-sm text-gray-600">Score: {{ $rating->score }}/10</p>
                                            @if($rating->comment)
                                                <p class="text-sm text-gray-500">{{ $rating->comment }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <form action="{{ route('ratings.destroy', $rating) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 text-sm" onclick="return confirm('Delete this rating?')">Delete</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>