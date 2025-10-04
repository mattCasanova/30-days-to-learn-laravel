<x-layout>
    <x-slot:heading>Create Job</x-slot:heading>

    <form class="mt-10" action="/jobs" method="POST">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12">
                <h2 class="text-base/7 font-semibold text-white">Create a New Job</h2>
                <p class="mt-1 text-sm/6 text-gray-400">We just need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="title" id="title" placeholder="Programmer" required />
                            <x-form-error name="title" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="salary" id="salary" placeholder="$60,000" required />
                            <x-form-error name="salary" />
                        </div>
                    </x-form-field>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm/6 font-semibold text-white">Cancel</button>
                <x-form-button>Save</x-form-button>
            </div>
        </div>
    </form>
</x-layout>

<!-- If we want to show all errors at the top of the form instead of next to each field individually, we can use this code:
@if ($errors->any())
    <div class="sm:col-span-6">
        <ul class="list-disc space-y-1 pl-5 text-sm/6 text-purple-400 italic">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
-->
