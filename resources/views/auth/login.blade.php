<x-layout>
    <x-slot:heading>Login</x-slot:heading>

    <form class="mt-10" action="/login" method="POST">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" id="email" required type="email" />
                            <x-form-error name="email" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password" id="password" required type="password" />
                            <x-form-error name="password" />
                        </div>
                    </x-form-field>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/" class="text-sm/6 font-semibold text-white">Cancel</a>
                <x-form-button>Log In</x-form-button>
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
