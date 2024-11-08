<div class="bg-white p-4 rounded-lg shadow mb-6">
    <form action="{{ route('jobs.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label for="search" class="block text-sm font-medium text-gray-700">Suchbegriff</label>
            <input type="text" name="search" id="search" value="{{ request('search') }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>

        <div>
            <label for="type" class="block text-sm font-medium text-gray-700">Beschäftigungsart</label>
            <select name="type" id="type"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <option value="">Alle</option>
                <option value="Vollzeit" {{ request('type') == 'Vollzeit' ? 'selected' : '' }}>Vollzeit</option>
                <option value="Teilzeit" {{ request('type') == 'Teilzeit' ? 'selected' : '' }}>Teilzeit</option>
                <option value="Remote" {{ request('type') == 'Remote' ? 'selected' : '' }}>Remote</option>
            </select>
        </div>

        <div>
            <label for="salary_min" class="block text-sm font-medium text-gray-700">Mindestgehalt</label>
            <input type="number" name="salary_min" id="salary_min" value="{{ request('salary_min') }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>

        <div class="flex items-end">
            <button type="submit"
                    class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Suchen
            </button>
        </div>
    </form>
</div>
