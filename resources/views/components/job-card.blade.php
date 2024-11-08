@props(['job'])

<div class="bg-white rounded-lg shadow-md p-6 mb-4 hover:shadow-lg transition-shadow duration-200">
    <div class="flex justify-between items-start">
        <div>
            <h3 class="text-xl font-semibold text-gray-800">
                <a href="{{ route('jobs.show', $job) }}" class="hover:text-blue-600">
                    {{ $job->title }}
                </a>
            </h3>
            <div class="mt-2 text-gray-600">
                <p class="text-sm">{{ $job->company }}</p>
                <div class="flex items-center space-x-4 mt-2">
                    <span class="flex items-center text-sm">
                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ $job->location }}
                    </span>
                    <span class="flex items-center text-sm">
                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $job->type }}
                    </span>
                </div>
            </div>
        </div>
        <div class="text-right">
            <span class="text-sm font-medium text-gray-600">
                {{ $job->formatted_salary }}
            </span>
            @auth
                <form action="{{ route('saved.store', $job) }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="text-blue-600 hover:text-blue-800">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                        </svg>
                    </button>
                </form>
            @endauth
        </div>
    </div>
</div>
