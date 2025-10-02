<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <nav class="bg-gray-800 p-4">
        <ul class="flex space-x-4">
            <x-nav-link>
                <x-slot:link>
                    '/'
                </x-slot:link>
                Home
            </x-nav-link>
            <x-nav-link>
                <x-slot:link>
                    '/about'
                </x-slot:link>
                About
            </x-nav-link>
            <x-nav-link>
                <x-slot:link>
                    '/contact'
                </x-slot:link>
                Contact
            </x-nav-link>
        </ul>
    </nav>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        {{ $slot }}
    </div>
</body>
</html>
