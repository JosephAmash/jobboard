<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">{{ $job->title }}</h1>
                            <div class="mt-2 text-gray-600">
                                <p class="text-lg">{{ $job->company }}</p>
                                <div class="flex items-center space-x-4 mt-2">
                                    <span class="flex items-center">
                                        <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        {{ $job->location }}
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $job->type }}
                                    </span>
                                    <span class="text-lg font-medium">
                                        {{ $job->formatted_salary }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        @auth
                            <form action="{{ route('saved.store', $job) }}" method="POST">
                                @csrf
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                                    </svg>
                                    Job speichern
                                </button>
                            </form>
                        @endauth
                    </div>

                    <div class="mt-8 prose max-w-none">
                        <h2 class="text-xl font-semibold mb-4">Beschreibung</h2>
                        <div class="text-gray-700">
                            {{ $job->description }}
                        </div>

                        <h2 class="text-xl font-semibold mt-8 mb-4">Anforderungen</h2>
                        <div class="text-gray-700">
                            {{ $job->requirements }}
                        </div>

                        <h2 class="text-xl font-semibold mt-8 mb-4">Benefits</h2>
                        <div class="text-gray-700">
                            {{ $job->benefits }}
                        </div>
                    </div>

                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <p class="text-sm text-gray-500">
                            Veröffentlicht von {{ $job->user->name }} am {{ $job->created_at->format('d.m.Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
