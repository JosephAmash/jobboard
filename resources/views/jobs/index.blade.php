<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Stellenangebote</h1>

            <x-search-filters />

            <div class="space-y-6">
                @forelse ($jobs as $job)
                    <x-job-card :job="$job" />
                @empty
                    <div class="bg-white rounded-lg shadow-md p-6 text-center">
                        <p class="text-gray-500">Keine Stellenangebote gefunden.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
