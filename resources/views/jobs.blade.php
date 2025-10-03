<x-layout>
    <x-slot:heading>Jobs Listings</x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job->id }}" class="block px-4 py-6 border border-gray-700 rounded-lg max-w-3xl">
                <div class="font-bold text-sm text-blue-200 mb-2 hover:underline">
                    Posted by {{ $job->employer->name }}
                </div>
                <div class="text-blue-300">
                    <strong>{{ $job->title }}</strong>: Pays {{ $job->salary }} per year.
                </div>
            </a>
        @endforeach
    </div>

</x-layout>
