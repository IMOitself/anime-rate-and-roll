<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rated Animes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @forelse($animes as $anime)
                            <div class="border rounded-lg p-4 flex flex-col h-full">
                                <img src="{{ $anime->image_url }}" class="h-48 w-full object-cover rounded mb-2">
                                <a href="{{ route('animes.show', $anime) }}" class="font-semibold text-indigo-600 hover:underline mb-1 line-clamp-2">{{ $anime->title }}</a>
                                <div class="mt-auto">
                                    <p class="text-sm text-yellow-600 font-bold mb-1">{{ number_format($anime->ratings_avg_score ?? 0, 1) }} ★</p>
                                    <p class="text-xs text-gray-600">{{ $anime->ratings_count }} user ratings</p>
                                </div>
                            </div>
                        @empty
                            <p class="col-span-full text-center py-4">No animes found.</p>
                        @endforelse
                    </div>

                    <div class="mt-6">
                        {{ $animes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>