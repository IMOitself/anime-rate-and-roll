<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $anime->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 flex flex-col md:flex-row gap-6">
                    <img src="{{ $anime->image_url }}" class="h-64 rounded-lg shadow-md mx-auto md:mx-0">
                    <div>
                        <h3 class="text-2xl font-bold mb-2">{{ $anime->title }}</h3>
                        <p class="text-gray-600 mb-1">{{ $anime->episodes }} episodes</p>
                        <p class="text-indigo-600 font-bold mb-1">Average Rating: {{ number_format($anime->ratings_avg_score ?? 0, 1) }} ★</p>
                        <p class="text-gray-600">{{ $anime->ratings->count() }} user ratings</p>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">User Reviews</h3>
                    @forelse($anime->ratings as $rating)
                        <div class="border-b py-3 last:border-0">
                            <div class="flex justify-between">
                                <span class="font-medium">{{ $rating->user->name }}</span>
                                <span class="text-yellow-600 font-bold">{{ $rating->score }} ★</span>
                            </div>
                            @if($rating->comment)
                                <p class="text-gray-600 text-sm mt-1">{{ $rating->comment }}</p>
                            @endif
                        </div>
                    @empty
                        <p class="text-gray-500">No reviews yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>