<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Gespeicherte Stellenanzeigen</h1>

            <div class="space-y-6">
                @forelse ($savedJobs as $savedJob)
                    <div class="bg-white rounded-lg shadow-md p-6 relative">
                        <div class="absolute top-4 right-4">
                            <form action="{{ route('saved.destroy', $savedJob->job) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-red-500">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">
                                    <a href="{{ route('jobs.show', $savedJob->job) }}" class="hover:text-blue-600">
                                        {{ $savedJob->job->title }}
                                    </a>
                                </h3>
                                <div class="mt-2 text-gray-600">
                                    <p class="text-sm">{{ $savedJob->job->company }}</p>
                                    <div class="flex items-center space-x-4 mt-2">
                                        <span class="flex items-center text-sm">
                                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            {{ $savedJob->job->location }}
                                        </span>
                                        <span class="flex items-center text-sm">
                                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            {{ $savedJob->job->type }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-sm font-medium text-gray-600">
                                    {{ $savedJob->job->formatted_salary }}
                                </span>
                                <p class="text-xs text-gray-500 mt-2">
                                    Gespeichert am {{ $savedJob->created_at->format('d.m.Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-lg shadow-md p-6 text-center">
                        <p class="text-gray-500">Keine gespeicherten Stellenanzeigen vorhanden.</p>
                    </div>
                @endforelse

                <div class="mt-6">
                    {{ $savedJobs->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
