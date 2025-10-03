<x-layout>
    <x-slot:heading>Jobs Listings</x-slot:heading>

    <ul class="space-y-2">
        @foreach ($jobs as $job)
            <li class="text-white">
                <a href="/jobs/{{ $job->id }}" class="text-blue-300 hover:underline">
                    <strong>{{ $job->title }}</strong>: Pays {{ $job->salary }} per year.
                </a>
            </li>
        @endforeach
    </ul>

</x-layout>
