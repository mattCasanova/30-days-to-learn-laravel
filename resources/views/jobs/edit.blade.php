<x-layout>
    <x-slot:heading>Edit Job: {{ $job->title }} </x-slot:heading>

    <form class="mt-10" action="/jobs/{{ $job->id }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="title" id="title" placeholder="Programmer" value="{{ $job->title }}" />
                            <x-form-error name="title" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="salary" id="salary" placeholder="$60,000" value="{{ $job->salary }}" required />
                            <x-form-error name="salary" />
                        </div>
                    </x-form-field>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-between gap-x-6">
                <div>
                    <button form="delete-form" type="submit"
                        class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500">Delete</button>
                </div>

                <div class="flex items-center justify-end gap-x-6">
                    <a href="/jobs/{{ $job->id }}" type="button" class="text-sm/6 font-semibold text-white">Cancel</a>
                    <x-form-button>Update</x-form-button>
                </div>
            </div>
        </div>
    </form>

    <form class="hidden" action="/jobs/{{ $job->id }}" method="POST" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
