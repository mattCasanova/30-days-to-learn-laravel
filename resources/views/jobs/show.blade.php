<x-layout>
    <x-slot:heading>Job</x-slot:heading>
    <h2 class="text-2xl font-bold text-white">{{ $job->title }}</h2>

    <p class="text-white">This job pays {{ $job->salary }} per year.</p>

    <div class="mt-4 font-bold text-sm text-blue-200">
        Posted by {{ $job->employer->name }}
    </div>

    @can('edit', $job)
        <x-button href="/jobs/{{ $job->id }}/edit" class="mt-6">Edit Job</x-button>
    @endcan
</x-layout>
