<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Animes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($animes as $anime)
                            <div class="border rounded-lg p-4">
                                <img src="{{ $anime->image_url }}" class="h-40 w-full object-cover rounded mb-2">
                                <a href="{{ route('animes.show', $anime) }}" class="font-semibold text-indigo-600 hover:underline">{{ $anime->title }}</a>
                                <p class="text-sm text-gray-600">{{ $anime->ratings_count }} ratings</p>
                            </div>
                        @empty
                            <p>No animes found.</p>
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